<?php

Namespace DesignPatterns\Behavioral\Specification\Specification;

class SpecificationFactory
{

  const ERROR_INVALID_VALIDATOR = 'Invalid validator\'s name specified';

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
      throw new \Exception(self::ERROR_INVALID_VALIDATOR);
    }

    /** @var AbstractSpecification $spec */
    $spec = new $className();
    $spec->setParams($params);

    return $spec;
  }

}