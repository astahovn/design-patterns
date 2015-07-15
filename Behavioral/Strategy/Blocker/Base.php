<?php

Namespace DesignPatterns\Behavioral\Strategy\Blocker;

use DesignPatterns\Behavioral\Strategy\Company\Company;
use DesignPatterns\Behavioral\Strategy\Procedure\Procedure;

/**
 * Class BaseBlocker
 *   Base participation fee
 * @package Blocker
 */
class BaseBlocker implements BlockerInterface
{

  /** Base participation fee */
  const BASE_FEE = 3000;

  /**
   * @inheritdoc
   */
  public function block(Company $company, Procedure $procedure)
  {
    $company->setDeposit($company->getDeposit() - self::BASE_FEE);
  }

  /**
   * @inheritdoc
   */
  public function unblock(Company $company, Procedure $procedure)
  {
    $company->setDeposit($company->getDeposit() + self::BASE_FEE);
  }

}