<?php

Namespace DesignPatterns\Structural\FluentInterface\Procedure;

/**
 * Class Procedure
 * @package DesignPatterns\Structural\FluentInterface\Procedure
 *
 * @method string getName()
 * @method float getPrice()
 * @method string getDescription()
 *
 * @method Procedure setName(string $name)
 * @method Procedure setPrice(float $price)
 * @method Procedure setDescription(string $description)
 */
class Procedure
{

  /** @var string $name */
  protected $name;
  /** @var float $price */
  protected $price;
  /** @var string $description */
  protected $description;

  /**
   * Set object property
   * @param string $name
   * @param array $args
   * @return $this
   * @throws \Exception
   */
  public function __call($name, $args)
  {
    $name = strtolower($name);

    $property = substr($name, 3);
    if (!property_exists(__NAMESPACE__ . '\\Procedure', $property)) {
      throw new \Exception('Wrong method call');
    }

    $action = substr($name, 0, 3);
    if (!in_array($action, ['set', 'get'])) {
      throw new \Exception('Wrong method call');
    }

    if ('get' === $action) {
      return $this->$property;
    }

    if (!array_key_exists(0, $args)) {
      throw new \Exception('Missed method argument');
    }

    $this->$property = $args[0];
    return $this;
  }

}