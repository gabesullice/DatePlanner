<?php

namespace Planner\Sorter;

interface ItemSorterInterface {
  /**
   * Sorts an array of sortable items.
   *
   * @param \Planner\Item\SortableItemInterface[]
   * 
   * @return \Planner\Item\SortableItemInterface[]
   */
  public function sort(&$items);
}
