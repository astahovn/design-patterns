<?php

Namespace DesignPatterns\Behavioral\Specification\Specification;

class RequiredSpecification extends AbstractSpecification
{

  /**
   * Check if specification satisfied by given value
   * @param mixed $value
   * @return bool
   */
  public function isSatisfiedBy($value)
  {
    return !is_null($value) && ('' !== $value);
  }

}