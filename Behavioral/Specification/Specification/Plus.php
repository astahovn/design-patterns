<?php

Namespace DesignPatterns\Behavioral\Specification\Specification;

class Plus extends AbstractSpecification
{
  /** @var SpecificationInterface $left */
  protected $left;
  /** @var SpecificationInterface $right */
  protected $right;

  /**
   * @param SpecificationInterface $left
   * @param SpecificationInterface $right
   */
  public function __construct(SpecificationInterface $left, SpecificationInterface $right)
  {
    $this->left = $left;
    $this->right = $right;
  }

  /**
   * Check if specification satisfied by given value
   * @param mixed $value
   * @return bool
   */
  public function isSatisfiedBy($value)
  {
    return $this->left->isSatisfiedBy($value) && $this->right->isSatisfiedBy($value);
  }

}