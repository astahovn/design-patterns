<?php

Namespace Application;

use Company\Company;
use Procedure\Procedure;
use Blocker\BlockerInterface;

class Application
{
  /** @var Company $company */
  protected $company;

  /** @var Procedure $procedure */
  protected $procedure;

  public function __construct(Company $company, Procedure $procedure)
  {
    $this->company = $company;
    $this->procedure = $procedure;
  }

  public function blockMoney(BlockerInterface $blocker)
  {
    $blocker->block($this->company, $this->procedure);
  }

  public function unblockMoney(BlockerInterface $blocker)
  {
    $blocker->unblock($this->company, $this->procedure);
  }
}