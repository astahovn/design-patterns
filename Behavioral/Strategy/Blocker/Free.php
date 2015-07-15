<?php

Namespace Blocker;

use Company\Company;
use Procedure\Procedure;

/**
 * Class FreeBlocker
 *   Participation for free
 * @package Blocker
 */
class FreeBlocker implements BlockerInterface
{

  public function block(Company $company, Procedure $procedure)
  {
    // Nothing to do, because it's free participation
  }

  public function unblock(Company $company, Procedure $procedure)
  {
    // Nothing to do, because it's free participation
  }

}