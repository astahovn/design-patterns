<?php

Namespace Blocker;

use Company\Company;
use Procedure\Procedure;

interface BlockerInterface
{

  public function block(Company $company, Procedure $procedure);

  public function unblock(Company $company, Procedure $procedure);

}