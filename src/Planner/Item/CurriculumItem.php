<?php

namespace Planner\Item;

class CurriculumItem implements SortableItemInterface, RelativeItemGeneratorInterface {
  use OffsetItem;

  public $reminders = array();

  public function isExclusive() { return TRUE; }

  public function addReminder($relativeOffset) {
    $reminder =  new ReminderItem($this->getPlanOffset() + $relativeOffset);
    array_push($this->reminders, $reminder);
  }

  public function getRelatives() {
    return $this->reminders;
  }
}