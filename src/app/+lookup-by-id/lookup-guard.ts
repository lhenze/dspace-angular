import { ActivatedRouteSnapshot, CanActivate, Router, RouterStateSnapshot } from '@angular/router';
import { Injectable } from '@angular/core';
import { IdentifierType } from '../core/data/request.models';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { RemoteData } from '../core/data/remote-data';
import { FindByIDRequest } from '../core/data/request.models';
import { DsoRedirectDataService } from '../core/data/dso-redirect-data.service';

interface LookupParams {
  type: IdentifierType;
  id: string;
}

@Injectable()
export class LookupGuard implements CanActivate {

  constructor(private dsoService: DsoRedirectDataService) {
  }

  canActivate(route: ActivatedRouteSnapshot, state:RouterStateSnapshot): Observable<boolean>  {
    const params = this.getLookupParams(route);
    return this.dsoService.findById(params.id, params.type).pipe(
      map((response: RemoteData<FindByIDRequest>) => response.hasFailed)
    );
  }

  private getLookupParams(route: ActivatedRouteSnapshot): LookupParams {
    let type;
    let id;
    const idType = route.params.idType;

    // If the idType is not recognized, assume a legacy handle request (handle/prefix/id)
    if (idType !== IdentifierType.HANDLE && idType !== IdentifierType.UUID) {
      type = IdentifierType.HANDLE;
      const prefix = route.params.idType;
      const handleId = route.params.id;
      id = `${prefix}/${handleId}`;

    } else if (route.params.idType === IdentifierType.HANDLE) {
      type = IdentifierType.HANDLE;
      id = route.params.id;

    } else {
      type = IdentifierType.UUID;
      id = route.params.id;
    }
    return {
      type: type,
      id: id
    };
  }
}
