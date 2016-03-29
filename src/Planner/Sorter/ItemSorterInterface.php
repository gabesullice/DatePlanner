<?php

namespace Planner\Item\Sorter;

interface ItemSorterInterface {
  /**
   * Sorts an array of sortable items.
   *
   * @param \Planner\Item\SortableItemInterface[]
   * 
   * @return \Planner\Item\SortableItemInterface[]
   */
  public static function sort($items);
}
