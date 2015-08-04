<?php

Namespace DesignPatterns\Behavioral\Visitor\Procedure;

use DesignPatterns\Behavioral\Visitor\Visitor\VisitorUnitsInfo;

class Procedure
{

  /** @var Unit[] $units */
  protected $units = [];

  /**
   * Add procedure unit
   * @param Unit $unit
   */
  public function addUnit($unit)
  {
    $this->units[] = $unit;
  }

  /**
   * Get units info
   * @return string
   */
  public function getUnitsInfo()
  {
    $visitor = new VisitorUnitsInfo();
    foreach($this->units as $unit) {
      $unit->accept($visitor);
    }
    return $visitor->getInfo();
  }

}