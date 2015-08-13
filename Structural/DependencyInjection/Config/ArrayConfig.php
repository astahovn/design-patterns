<?php

Namespace DesignPatterns\Structural\DependencyInjection\Config;

/**
 * Class ArrayConfig
 * Config implementation which retrieves it's data from .php file with a single array inside.
 *
 * @package DesignPatterns\Structural\DependencyInjection\Config
 */
class ArrayConfig implements ParametersInterface
{

  /** @var array $storage */
  protected $storage;

  public function __construct(array $storage = [])
  {
    $this->storage = $storage;
  }

  /**
   * Get config param
   * @param string $param
   * @return mixed
   */
  public function get($param)
  {
    if (array_key_exists($param, $this->storage)) {
      return $this->storage[$param];
    }

    return null;
  }

}