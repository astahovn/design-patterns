<?php

Namespace DesignPatterns\Behavioral\Strategy\Blocker;

use DesignPatterns\Behavioral\Strategy\Company\Company;
use DesignPatterns\Behavioral\Strategy\Procedure\Procedure;

/**
 * Class SeriousBlocker
 *   Serious participation fee
 * @package Blocker
 */
class SeriousBlocker implements BlockerInterface
{

  /** fee percent of the procedure start price */
  const SERIOUS_FEE_PERCENT = 10;

  /**
   * Calc fee using procedure start price
   * @param Procedure $procedure
   * @return float
   */
  protected function getFee(Procedure $procedure)
  {
    return $procedure->getStartPrice()*self::SERIOUS_FEE_PERCENT/100;
  }

  /**
   * @inheritdoc
   */
  public function block(Company $company, Procedure $procedure)
  {
    $company->setDeposit($company->getDeposit() - $this->getFee($procedure));
  }

  /**
   * @inheritdoc
   */
  public function unblock(Company $company, Procedure $procedure)
  {
    $company->setDeposit($company->getDeposit() + $this->getFee($procedure));
  }

}