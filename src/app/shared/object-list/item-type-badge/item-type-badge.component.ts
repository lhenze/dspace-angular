import { Component, Input } from '@angular/core';
import { DSpaceObject } from '../../../core/shared/dspace-object.model';

@Component({
  selector: 'ds-item-type-badge',
  templateUrl: './item-type-badge.component.html'
})
/**
 * Component rendering the type of an item as a badge
 */
export class ItemTypeBadgeComponent {
  /**
   * The component used to retrieve the type from
   */
  @Input() object: DSpaceObject;
}
