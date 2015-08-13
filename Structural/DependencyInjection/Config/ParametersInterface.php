<?php

Namespace DesignPatterns\Structural\DependencyInjection\Config;

/**
 * Interface ParametersInterface
 * There is we need readonly config object.
 * Our Procedure class can't change it.
 *
 * @package DesignPatterns\Structural\DependencyInjection\Config
 */
interface ParametersInterface
{

  /**
   * Get config param
   * @param string $param
   * @return mixed
   */
  public function get($param);

}