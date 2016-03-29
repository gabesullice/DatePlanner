<?php

include "vendor/autoload.php";

use Planner\Item\CurriculumItem;
use Planner\Item\ImmovableItem;

use Planner\Sorter\ItemSorter;
use Planner\DateMapper\DateMapper;

$items = array(
  new CurriculumItem(5),
  new ImmovableItem(3),
  new CurriculumItem(3),
);

$sorter = new ItemSorter();

$sorted_items = $sorter-sort($items);

$consolidated = DateMapper::consolidateItems($sorted_items);

$dates = DateMapper::offsetsToDates('2016-01-01', array_keys($consolidated));

$scheduled_items = array_combine($dates, array_values($consolidated));
