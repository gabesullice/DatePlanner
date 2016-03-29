<?php

namespace Planner\Sorter;

class ItemSorter implements ItemSorterInterface {
  /**
   * The item comparator.
   *
   * @var \Planner\Sorter\SortableItemComparatorInterface
   */
  protected $comparator;

  public function __construct(SortableItemComparatorInterface $comparator = null) {
    if (is_null($comparator)) {
      $comparator = new SortableItemComparator();
    }
    $this->comparator = $comparator;
  }

  /**
   * {@inheritdoc}
   */
  public static function sort($items) {
    $compare_items = function ($a, $b) {
      return $this->comparator->compare($a, $b);
    };

    try {
      $sorted = uasort($items, $compare_items);
    }
    catch (\Exception $e) {
      $err_msg = sprintf("%s: %s", "Unable to sort items", $e->getMessage());
      throw new \Exception($err_msg, 0, $e);
    }

    return $sorted;
  }
}
