<?php

Namespace Company;

class Company {

  /** @var float $deposit */
  protected $deposit = 0;

  /**
   * @param float $sum
   */
  public function setDeposit($sum)
  {
    $this->deposit = $sum;
  }

  /**
   * @return float
   */
  public function getDeposit()
  {
    return $this->deposit;
  }

}