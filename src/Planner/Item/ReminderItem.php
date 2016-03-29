<?php

namespace PlannerItem;

class Reminder implements SortableItemInterface {
  use OffsetItem;

  public function isExclusive() { 
    return FALSE;
  }
}
