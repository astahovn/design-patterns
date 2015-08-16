<?php

Namespace DesignPatterns\Structural\Decorator\Renderer;

abstract class Decorator implements RendererInterface
{

  /** @var RendererInterface $wrapped */
  protected $wrapped;

  /**
   * @param RendererInterface $wrapped
   */
  public function __construct(RendererInterface $wrapped)
  {
    $this->wrapped = $wrapped;
  }

}