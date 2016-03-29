<?php

namespace Planner\Item;

class ImmovableItem implements SortableItemInterface {
  use OffsetItem;

  public function isExclusive() {
    return TRUE;
  }
}
