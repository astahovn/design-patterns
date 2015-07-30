<?php

Namespace DesignPatterns\Behavioral\State\AppList;

use DesignPatterns\Behavioral\State\Procedure\Procedure;

/**
 * Class AppListBase
 *
 * Common part for every application list
 *
 * @package DesignPatterns\Behavioral\State\AppList
 */
class AppListBase
{

  /** @property Procedure procedure */
  protected $procedure;

  public function __construct(Procedure $procedure)
  {
    $this->procedure = $procedure;
  }

}