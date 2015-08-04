<?php

Namespace DesignPatterns\Behavioral\Visitor\Procedure;

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

}