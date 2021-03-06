<?php

Namespace DesignPatterns\Behavioral\Specification\Specification;

interface SpecificationInterface
{

  /**
   * Check if specification satisfied by given value
   * @param mixed $value
   * @return bool
   */
  public function isSatisfiedBy($value);

  /**
   * Logical AND specification
   * @param SpecificationInterface $spec
   * @return SpecificationInterface
   */
  public function plus(SpecificationInterface $spec);

}