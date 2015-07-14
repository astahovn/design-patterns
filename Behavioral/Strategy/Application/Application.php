<?php

Namespace Application;

use Company\Company;
use Blocker\BlockerInterface;

class Application
{
  /** @var Company $company */
  protected $company;

  public function __construct(Company $company)
  {
    $this->company = $company;
  }

  public function blockMoney(BlockerInterface $blocker)
  {
    $blocker->block($this->company);
  }

  public function unblockMoney(BlockerInterface $blocker)
  {
    $blocker->unblock($this->company);
  }
}