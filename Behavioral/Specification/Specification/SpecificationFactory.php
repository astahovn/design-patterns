<?php

Namespace DesignPatterns\Behavioral\Specification\Specification;

class SpecificationFactory
{

  /**
   * Closed access to the constructor
   */
  private function __construct() {}

  /**
   * Gets needed specification
   * @param string $name
   * @param array $params
   * @return SpecificationInterface
   * @throws \Exception
   */
  public static function getSpecification($name, array $params = [])
  {
    $className = __NAMESPACE__ . '\\' . $name . 'Specification';
    if (!class_exists($className)) {
      throw new \Exception('Invalid validator\'s name specified');
    }

    /** @var AbstractSpecification $spec */
    $spec = new $className();
    $spec->setParams($params);

    return $spec;
  }

}