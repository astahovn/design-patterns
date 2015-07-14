<?php

Namespace Blocker;

use Company\Company;

/**
 * Class FreeBlocker
 *   Participation for free
 * @package Blocker
 */
class FreeBlocker implements BlockerInterface
{

  public function block(Company $company)
  {
    // Nothing to do, because it's free participation
  }

  public function unblock(Company $company)
  {
    // Nothing to do, because it's free participation
  }

}