<?php

Namespace DesignPatterns\Behavioral\Visitor\Procedure;

use DesignPatterns\Behavioral\Visitor\Visitor\VisitorInterface;

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

  /**
   * Visit class instance
   * @param VisitorInterface $visitor
   */
  public function accept(VisitorInterface $visitor)
  {
    $calledClass = get_called_class();
    preg_match('/([\w]+)$/', $calledClass, $matches);
    $visitorMethod = 'visit' . $matches[1];

    if (!method_exists('DesignPatterns\Behavioral\Visitor\Visitor\VisitorInterface', $visitorMethod)) {
      throw new \InvalidArgumentException('The visitor can not visit ' . $calledClass);
    }

    call_user_func([$visitor, $visitorMethod], $this);
  }

}