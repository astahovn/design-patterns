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
abstract class AppListAbstract implements AppListInterface
{

  /** @var DbInterface $db */
  protected $db;

  /** @var Procedure procedure */
  protected $procedure;

  /**
   * Get published applications count
   * @return int
   */
  abstract public function getCount();

  /**
   * Get published applications list
   * @return array
   */
  abstract public function getList();

  public function __construct(Procedure $procedure)
  {
    $this->db = new Db();
    $this->procedure = $procedure;
  }

}