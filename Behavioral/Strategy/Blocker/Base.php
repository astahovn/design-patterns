<?php

Namespace Blocker;

use Company\Company;

/**
 * Class BaseBlocker
 *   Base participation fee
 * @package Blocker
 */
class BaseBlocker implements BlockerInterface
{

  const BASE_FEE = 3000;

  public function block(Company $company)
  {
    $company->setDeposit($company->getDeposit() - self::BASE_FEE);
  }

  public function unblock(Company $company)
  {
    $company->setDeposit($company->getDeposit() + self::BASE_FEE);
  }

}