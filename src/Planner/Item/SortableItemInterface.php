<?php

namespace Planner\Item;

interface SortableItemInterface {
  public function getOffset();
  public function isExclusive();
  public function isImmovable();
}
