<?php

namespace Planner\Sorter;

use Planner\Item\SortableItemInterface;

class SortableItemComparator implements SortableItemComparatorInterface {
  const BEFORE   = -1;
  const EQUAL  = 0;
  const AFTER   = 1;

  /**
   * {@inheritdoc}
   * 
   * @throw \Exception
   *   An exception will be thrown if an unsortable scenario arises.
   */
  public static function compare(SortableItemInterface $one, SortableItemInterface $two) {
    $offset_one = $one->getOffset();
    $offset_two = $two->getOffset();

    if ($offset_one != $offset_two) {
      return ($offset_one < $offset_two) ? self::BEFORE : self::AFTER;
    }

    $one_is_exclusive = $one->isExclusive();
    $two_is_exclusive = $two->isExclusive();

    if ($one_is_exclusive xor $two_is_exclusive) {
      return ($one_is_exclusive) ? self::BEFORE : self::AFTER;
    }

    $one_is_immovable = $one->isImmovable();
    $two_is_immovable = $two->isImmovable();

    if ($one_is_immovable xor $two_is_immovable) {
      return ($one_is_immovable) ? self::BEFORE : self::AFTER;
    }

    if ($one_is_immovable && $two_is_immovable) {
      throw new \Exception("Logic Exception: Items cannot be exclusive, immovable and have the same offset.");
    }

    return self::EQUAL;
  }
}
