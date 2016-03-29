<?php

namespace Planner\Item;

trait OffsetItem {
  protected $planOffset;

  public function __construct($offset) {
    $this->planOffset = $offset;
  }

  public function getPlanOffset() {
    return $this->planOffset();
  }
}
