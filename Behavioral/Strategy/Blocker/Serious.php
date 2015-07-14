<?php

Namespace Blocker;

use Company\Company;

/**
 * Class SeriousBlocker
 *   Serious participation fee
 * @package Blocker
 */
class SeriousBlocker implements BlockerInterface
{

  const SERIOUS_FEE = 5000;

  public function block(Company $company)
  {
    $company->setDeposit($company->getDeposit() - self::SERIOUS_FEE);
  }

  public function unblock(Company $company)
  {
    $company->setDeposit($company->getDeposit() + self::SERIOUS_FEE);
  }

}