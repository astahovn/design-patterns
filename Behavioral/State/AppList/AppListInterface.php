<?php

Namespace DesignPatterns\Behavioral\State\AppList;

/**
 * Interface AppListInterface
 *
 * Applications list interface
 *
 * @package DesignPatterns\Behavioral\State\AppList\AppListInterface
 */
interface AppListInterface
{

  /**
   * Get published applications count
   * @return int
   */
  public function getCount();

  /**
   * Get published applications list
   * @return array
   */
  public function getList();

}