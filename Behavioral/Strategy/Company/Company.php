<?php

Namespace DesignPatterns\Behavioral\Strategy\Company;

/**
 * Class Company
 *
 * Company is a supplier, which participates in procedures
 *
 * @package Company
 */
class Company {

  /** @var float $deposit */
  protected $deposit = 0;

  /**
   * Set actual company's deposit
   *
   * @param float $sum
   */
  public function setDeposit($sum)
  {
    $this->deposit = $sum;
  }

  /**
   * Get actual company's deposit
   *
   * @return float
   */
  public function getDeposit()
  {
    return $this->deposit;
  }

}