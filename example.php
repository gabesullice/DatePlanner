#!/usr/bin/php
<?php

include "vendor/autoload.php";

use Planner\Item\CurriculumItem;
use Planner\Item\ImmovableItem;
use Planner\Item\ReminderItem;

use Planner\Sorter\ItemSorter;
use Planner\DateMapper\DateMapper;

// Here we create an array of all items and their offsets.
$items = array(
  0 => new CurriculumItem(5),
  1 => new CurriculumItem(3),
  2 => new ImmovableItem(3),
  3 => new CurriculumItem(0),
  4 => new CurriculumItem(1),
  5 => new CurriculumItem(3),
);

// Here, an item is created relative to another item.
$items[5]->addReminder(-2);

// @todo write a reducer which expands child items into a flat array.

$sorter = new ItemSorter();

$sorter->sort($items);

$consolidated = DateMapper::consolidateItems($items);

$dates = DateMapper::offsetsToDates('2016-01-01', array_keys($consolidated));

$scheduled_items = array_combine($dates, array_values($consolidated));

var_export($scheduled_items);
