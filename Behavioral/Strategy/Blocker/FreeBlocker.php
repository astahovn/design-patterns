<?php

Namespace DesignPatterns\Behavioral\Strategy\Blocker;

use DesignPatterns\Behavioral\Strategy\Company\Company;
use DesignPatterns\Behavioral\Strategy\Procedure\Procedure;

/**
 * Class FreeBlocker
 *   Participation for free
 * @package Blocker
 */
class FreeBlocker implements BlockerInterface
{

  /**
   * @inheritdoc
   */
  public function block(Company $company, Procedure $procedure)
  {
    // Nothing to do, because it's free participation
  }

  /**
   * @inheritdoc
   */
  public function unblock(Company $company, Procedure $procedure)
  {
    // Nothing to do, because it's free participation
  }

}