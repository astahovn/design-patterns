<?php

Namespace DesignPatterns\Behavioral\Strategy\Procedure;

/**
 * Class Procedure
 *
 * Procedure makes it possible to choose the best supplier for our goods
 *
 * @package Procedure
 */
class Procedure {

  /** @var float $startPrice */
  protected $startPrice = 0;

  /**
   * Set procedure's start price
   *
   * @param float $sum
   */
  public function setStartPrice($sum)
  {
    $this->startPrice = $sum;
  }

  /**
   * Get procedure's start price
   *
   * @return float
   */
  public function getStartPrice()
  {
    return $this->startPrice;
  }

}