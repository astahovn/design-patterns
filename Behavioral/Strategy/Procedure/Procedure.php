<?php

Namespace Procedure;

class Procedure {

  /** @var float $startPrice */
  protected $startPrice = 0;

  /**
   * @param float $sum
   */
  public function setStartPrice($sum)
  {
    $this->startPrice = $sum;
  }

  /**
   * @return float
   */
  public function getStartPrice()
  {
    return $this->startPrice;
  }

}