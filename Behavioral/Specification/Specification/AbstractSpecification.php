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

}