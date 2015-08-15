<?php

Namespace DesignPatterns\Structural\DependencyInjection\Procedure;

use DesignPatterns\Structural\DependencyInjection\Config\ParametersInterface;

class Procedure
{

  /** @var ParametersInterface $config */
  protected $config;

  /**
   * @param ParametersInterface $config
   */
  public function __construct(ParametersInterface $config)
  {
    $this->setConfig($config);
  }

  /**
   * Setup procedure's config
   * @param ParametersInterface $config
   */
  public function setConfig(ParametersInterface $config)
  {
    $this->config = $config;
  }

  /**
   * Is documents using allowed
   * @return bool
   */
  public function isDocsEnabled()
  {
    return !!$this->config->get('is_docs_enabled');
  }

}