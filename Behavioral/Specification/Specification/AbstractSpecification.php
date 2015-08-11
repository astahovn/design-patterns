<?php

Namespace DesignPatterns\Behavioral\Specification\Specification;

abstract class AbstractSpecification implements SpecificationInterface
{

  /**
   * Logical AND specification
   * @param SpecificationInterface $spec
   * @return SpecificationInterface
   */
  public function plus(SpecificationInterface $spec)
  {
    return new Plus($this, $spec);
  }

  /**
   * Setting up specification's params
   * @param array $params
   */
  public function setParams($params)
  {
    // Should be redefined, if needed
  }

  /**
   * Check if value is empty
   * @param mixed $value
   * @return bool
   */
  protected function isEmpty($value)
  {
    return ('' === $value) || (is_null($value));
  }

}