<?php

Namespace Blocker;

use Company\Company;
use Procedure\Procedure;

/**
 * Class BaseBlocker
 *   Base participation fee
 * @package Blocker
 */
class BaseBlocker implements BlockerInterface
{

  const BASE_FEE = 3000;

  public function block(Company $company, Procedure $procedure)
  {
    $company->setDeposit($company->getDeposit() - self::BASE_FEE);
  }

  public function unblock(Company $company, Procedure $procedure)
  {
    $company->setDeposit($company->getDeposit() + self::BASE_FEE);
  }

}