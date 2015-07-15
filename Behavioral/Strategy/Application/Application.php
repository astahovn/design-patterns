<?php

Namespace Application;

use Company\Company;
use Procedure\Procedure;
use Blocker\BlockerInterface;

/**
 * Class Application
 *
 * Application of supplier to participate in the procedure
 *
 * @package Application
 */
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

  /**
   * Block supplier's money
   *
   * @param BlockerInterface $blocker
   */
  public function blockMoney(BlockerInterface $blocker)
  {
    $blocker->block($this->company, $this->procedure);
  }

  /**
   * Unblock supplier's money
   *
   * @param BlockerInterface $blocker
   */
  public function unblockMoney(BlockerInterface $blocker)
  {
    $blocker->unblock($this->company, $this->procedure);
  }
}