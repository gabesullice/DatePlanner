<?php

namespace Planner\Item;

trait OffsetItem {
  protected $offset;

  public function __construct($offset) {
    $this->planOffset = $offset;
  }

  public function getOffset() {
    return $this->offset;
  }
}
