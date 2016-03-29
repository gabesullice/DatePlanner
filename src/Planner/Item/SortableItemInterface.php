<?php

namespace Planner\Item;

interface SortableItemInterface {
  public function getOffset();
  public static function isExclusive();
  public static function isImmovable();
}
