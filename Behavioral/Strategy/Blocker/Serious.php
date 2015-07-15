<?php

Namespace Blocker;

use Company\Company;
use Procedure\Procedure;

/**
 * Class SeriousBlocker
 *   Serious participation fee
 * @package Blocker
 */
class SeriousBlocker implements BlockerInterface
{

  const SERIOUS_FEE_PERCENT = 10;

  protected function getFee(Procedure $procedure)
  {
    return $procedure->getStartPrice()*self::SERIOUS_FEE_PERCENT/100;
  }

  public function block(Company $company, Procedure $procedure)
  {
    $company->setDeposit($company->getDeposit() - $this->getFee($procedure));
  }

  public function unblock(Company $company, Procedure $procedure)
  {
    $company->setDeposit($company->getDeposit() + $this->getFee($procedure));
  }

}