<?php

namespace Planner\Sorter;

use Planner\Item\SortableItemInterface;

interface SortableItemComparatorInterface {
  /**
   * Returns -1, 1, or 0 if $one comese before, after, or at the same time as $two.
   */
  public function compare(SortableItemInterface $one, SortableItemInterface $two);
}
