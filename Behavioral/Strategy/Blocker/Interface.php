<?php

Namespace DesignPatterns\Behavioral\Strategy\Blocker;

use DesignPatterns\Behavioral\Strategy\Company\Company;
use DesignPatterns\Behavioral\Strategy\Procedure\Procedure;

/**
 * Interface BlockerInterface
 *
 * Describes the interface of money blocking at company's deposit
 *
 * @package Blocker
 */
interface BlockerInterface
{

  /**
   * Block money using procedure data at company's deposit
   *
   * @param Company $company
   * @param Procedure $procedure
   */
  public function block(Company $company, Procedure $procedure);

  /**
   * Unblock money using procedure data at company's deposit
   *
   * @param Company $company
   * @param Procedure $procedure
   */
  public function unblock(Company $company, Procedure $procedure);

}