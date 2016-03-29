<?php

namespace Planner\Item;

class ReminderItem implements SortableItemInterface {
  use OffsetItem;

  public static function isExclusive() { return FALSE; }
  public static function isImmovable() { return FALSE; }
}
