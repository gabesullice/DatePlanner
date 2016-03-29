<?php

namespace Planner\DateMapper;

use Planner\Item\SortableItemInterface;

class DateMapper {
  /**
   * Consolidates sorted items into a mutidimensional array, keyed by offset.
   *
   * @param Planner\Item\SortableItemInterface[] $items
   */
  public static function consolidateItems($items) {
    return array_reduce($items, function ($consolidated, $item) {
      // When an item is immovable or exclusive, create a new offset and append
      // to a new array at that offset.
      if ($item->isImmovable() || $item->isExclusive()) {
        $consolidated[][] = $item;
      }
      // When the item is non-exclusive and movable, append it to the last 
      // offset.
      else {
        $consolidated[count($consolidated) - 1][] = $item;
      }

      return $consolidated;
    }, array());
  }

  public static function offsetsToDates($start_date, $offsets) {
    $offsetToDate = function ($offset) use ($start_date) {
      $string = "{$start_date} +{$offset} days";
      return strtotime($string);
    };

    return array_map($offsetToDate, $offsets);
  }

  public static function datesToOffsets($start_date, $dates) {
    $dateToOffset = function ($date) use ($start_date) {
      $begin = \DateTime($start_date);
      $end = \DateTime($date);

      return $end->diff($begin)->format("%a");
    };

    return array_map($dateToOffset, $dates);
  }
}
