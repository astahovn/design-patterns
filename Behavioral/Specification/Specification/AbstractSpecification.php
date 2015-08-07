<?php

Namespace DesignPatterns\Behavioral\Specification\Specification;

abstract class AbstractSpecification implements SpecificationInterface
{

  /**
   * Check if specification satisfied by given value
   * @param mixed $value
   * @return bool
   */
  abstract public function isSatisfiedBy($value);

  /**
   * Logical AND specification
   * @param SpecificationInterface $spec
   * @return SpecificationInterface
   */
  public function plus(SpecificationInterface $spec)
  {
    return new Plus($this, $spec);
  }

}