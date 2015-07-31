<?php

Namespace DesignPatterns\Behavioral\State\AppList;

use DesignPatterns\Behavioral\State\Procedure\Procedure;
use DesignPatterns\Behavioral\State\Db\DbInterface;
use DesignPatterns\Behavioral\State\Tests\Db;

/**
 * Class AppListBase
 *
 * Common part for every application list
 *
 * @package DesignPatterns\Behavioral\State\AppList
 */
class AppListBase
{

  /** @var DbInterface $db */
  protected $db;

  /** @var Procedure procedure */
  protected $procedure;

  public function __construct(Procedure $procedure)
  {
    $this->db = new Db();
    $this->procedure = $procedure;
  }

}