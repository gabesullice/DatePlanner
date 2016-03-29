<?php

namespace Planner\Item;

class ImmovableItem implements SortableItemInterface {
  use OffsetItem;

  public static function isExclusive() { return TRUE; }
  public static function isImmovable() { return TRUE; }
}
