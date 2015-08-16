<?php

Namespace DesignPatterns\Structural\Decorator\Procedure;

use DesignPatterns\Structural\Decorator\Renderer\RendererInterface;

class Procedure implements RendererInterface
{

  /** @var string $name */
  protected $name;
  /** @var float $startPrice */
  protected $startPrice;
  /** @var string $description */
  protected $description;

  /**
   * @param array $data
   */
  public function __construct(array $data)
  {
    $this->name = $data['name'];
    $this->startPrice = $data['startPrice'];
    $this->description = $data['description'];
  }

  /**
   * As default use it like toArray()
   * @return array
   */
  public function renderData()
  {
    return [
      'name' => $this->name,
      'startPrice' => $this->startPrice,
      'description' => $this->description
    ];
  }

}