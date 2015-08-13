<?php

Namespace DesignPatterns\Structural\DependencyInjection\Config;

/**
 * Class DbConfig
 * Config implementation which retrieves it's data from some DB.
 *
 * @package DesignPatterns\Structural\DependencyInjection\Config
 */
class DbConfig implements ParametersInterface
{

  // something Db_Abstract
  protected $storage;

  public function __construct($storage)
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
    // $select = $this->storage->select();
    // $select->...
    // $result = $storage->findOne($select);
    $result = true;

    return $result;
  }

}