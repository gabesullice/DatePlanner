<?php

namespace Planner\Item;

trait OffsetItem {
  protected $offset;

  public function __construct($offset) {
    $this->offset = $offset;
  }

  public function getOffset() {
    return $this->offset;
  }
}
