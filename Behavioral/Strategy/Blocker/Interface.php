<?php

Namespace Blocker;

use Company\Company;

interface BlockerInterface
{

  public function block(Company $company);

  public function unblock(Company $company);

}