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
    $consolidated = array();

    $offset = 0;

    foreach ($items as $item) {
      // If the item is immovable, it must go at its offset index.
      if ($item->isImmovable()) {
        $consolidated[$item->getOffset()][] = $item;
        continue;
      }
      // If the item is exclusive, find the next available offset.
      if ($item->isExclusive()) {
        while (isset($consolidated[$offset])) {
          $offset += 1;
        }
      }
      // Insert the item at the found offset.
      $consolidated[$offset][] = $item;
    }

    return $consolidated;
    //return array_reduce($items, function ($consolidated, $item) {
    //  // When an item is immovable or exclusive, create a new offset and append
    //  // to a new array at that offset.
    //  if ($item->isImmovable() || $item->isExclusive()) {
    //    $consolidated[][] = $item;
    //  }
    //  // When the item is non-exclusive and movable, append it to the last 
    //  // offset.
    //  else {
    //    $consolidated[count($consolidated) - 1][] = $item;
    //  }

    //  return $consolidated;
    //}, array());
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
