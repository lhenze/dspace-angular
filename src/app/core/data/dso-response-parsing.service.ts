import { ObjectCacheService } from '../cache/object-cache.service';
import { Inject, Injectable } from '@angular/core';
import { GlobalConfig } from '../../../config/global-config.interface';
import { GLOBAL_CONFIG } from '../../../config';
import { NormalizedObject } from '../cache/models/normalized-object.model';
import { hasNoValue, hasValue, isNotEmpty } from '../../shared/empty.util';
import { ResourceType } from '../shared/resource-type';
import { NormalizedObjectFactory } from '../cache/models/normalized-object-factory';
import { DSpaceRESTv2Serializer } from '../dspace-rest-v2/dspace-rest-v2.serializer';
import { CacheableObject } from '../cache/object-cache.reducer';
import { DSpaceRESTV2Response } from '../dspace-rest-v2/dspace-rest-v2-response.model';
import { RestResponse, DSOSuccessResponse } from '../cache/response-cache.models';
import { RestRequest } from './request.models';
import { PageInfo } from '../shared/page-info.model';
import { ResponseParsingService } from './parsing.service';

function isObjectLevel(halObj: any) {
  return isNotEmpty(halObj._links) && hasValue(halObj._links.self);
}

function isPaginatedResponse(halObj: any) {
  return isNotEmpty(halObj.page) && hasValue(halObj._embedded);
}

function flattenSingleKeyObject(obj: any): any {
  const keys = Object.keys(obj);
  if (keys.length !== 1) {
    throw new Error(`Expected an object with a single key, got: ${JSON.stringify(obj)}`);
  }
  return obj[keys[0]];
}

/* tslint:disable:max-classes-per-file */
class ProcessRequestDTO {
  [key: string]: NormalizedObject[]
}

@Injectable()
export class DSOResponseParsingService implements ResponseParsingService {
  constructor(
    @Inject(GLOBAL_CONFIG) private EnvConfig: GlobalConfig,
    private objectCache: ObjectCacheService,
  ) {
  }

  parse(request: RestRequest, data: DSpaceRESTV2Response): RestResponse {
    const processRequestDTO = this.process(data.payload, request.href);
    const selfLinks = flattenSingleKeyObject(processRequestDTO).map((no) => no.self);
    return new DSOSuccessResponse(selfLinks, data.statusCode, this.processPageInfo(data.payload.page))
  }

  protected process(data: any, requestHref: string): ProcessRequestDTO {

    if (isNotEmpty(data)) {
      if (isPaginatedResponse(data)) {
        return this.process(data._embedded, requestHref);
      } else if (isObjectLevel(data)) {
        return { topLevel: this.deserializeAndCache(data, requestHref) };
      } else {
        const result = new ProcessRequestDTO();
        if (Array.isArray(data)) {
          result.topLevel = [];
          data.forEach((datum) => {
            if (isPaginatedResponse(datum)) {
              const obj = this.process(datum, requestHref);
              result.topLevel = [...result.topLevel, ...flattenSingleKeyObject(obj)];
            } else {
              result.topLevel = [...result.topLevel, ...this.deserializeAndCache(datum, requestHref)];
            }
          });
        } else {
          Object.keys(data)
            .filter((property) => data.hasOwnProperty(property))
            .filter((property) => hasValue(data[property]))
            .forEach((property) => {
              if (isPaginatedResponse(data[property])) {
                const obj = this.process(data[property], requestHref);
                result[property] = flattenSingleKeyObject(obj);
              } else {
                result[property] = this.deserializeAndCache(data[property], requestHref);
              }
            });
        }
        return result;
      }
    }
  }

  protected deserializeAndCache(obj, requestHref: string): NormalizedObject[] {
    if (Array.isArray(obj)) {
      let result = [];
      obj.forEach((o) => result = [...result, ...this.deserializeAndCache(o, requestHref)])
      return result;
    }

    const type: ResourceType = obj.type;
    if (hasValue(type)) {
      const normObjConstructor = NormalizedObjectFactory.getConstructor(type);

      if (hasValue(normObjConstructor)) {
        const serializer = new DSpaceRESTv2Serializer(normObjConstructor);

        let processed;
        if (isNotEmpty(obj._embedded)) {
          processed = this.process(obj._embedded, requestHref);
        }
        const normalizedObj = serializer.deserialize(obj);

        if (isNotEmpty(processed)) {
          const linksOnly = {};
          Object.keys(processed).forEach((key) => {
            linksOnly[key] = processed[key].map((no: NormalizedObject) => no.self);
          });
          Object.assign(normalizedObj, linksOnly);
        }

        this.addToObjectCache(normalizedObj, requestHref);
        return [normalizedObj];

      } else {
        // TODO: move check to Validator?
        // throw new Error(`The server returned an object with an unknown a known type: ${type}`);
        return [];
      }

    } else {
      // TODO: move check to Validator
      // throw new Error(`The server returned an object without a type: ${JSON.stringify(obj)}`);
      return [];
    }
  }

  protected addToObjectCache(co: CacheableObject, requestHref: string): void {
    if (hasNoValue(co) || hasNoValue(co.self)) {
      throw new Error('The server returned an invalid object');
    }
    this.objectCache.add(co, this.EnvConfig.cache.msToLive, requestHref);
  }

  protected processPageInfo(pageObj: any): PageInfo {
    if (isNotEmpty(pageObj)) {
      return new DSpaceRESTv2Serializer(PageInfo).deserialize(pageObj);
    } else {
      return undefined;
    }
  }

}
/* tslint:enable:max-classes-per-file */
