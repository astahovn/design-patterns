<?php

Namespace DesignPatterns\Behavioral\Visitor\Procedure;

class Unit
{
  /** @var string $name */
  protected $name;

  /** @var float $price */
  protected $price;

  /** @var float $quantity */
  protected $quantity;

  /**
   * @param array $data
   */
  public function __construct($data)
  {
    $this->name = $data['name'];
    $this->price = $data['price'];
    $this->quantity = $data['quantity'];
  }

  /**
   * Getter
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Getter
   * @return float
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * Getter
   * @return float
   */
  public function getQuantity()
  {
    return $this->quantity;
  }

}