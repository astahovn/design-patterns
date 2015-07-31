<?php

Namespace DesignPatterns\Behavioral\State\Db;

/**
 * Interface DbInterface
 * @package DesignPatterns\Behavioral\State\Db
 */
interface DbInterface
{

  /**
   * Db query count
   * @return int
   */
  public function doQueryCount();

  /**
   * Db query rows
   * @return array
   */
  public function doQuery();

}