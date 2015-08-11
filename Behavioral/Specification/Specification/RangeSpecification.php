<?php

Namespace DesignPatterns\Behavioral\Specification\Specification;

class RangeSpecification extends AbstractSpecification
{
  /** @var int $min */
  protected $min;
  /** @var int $max */
  protected $max;

  /**
   * Check if specification satisfied by given value
   * @param float $value
   * @return bool
   */
  public function isSatisfiedBy($value)
  {
    if ($this->isEmpty($value)) {
      // if value is empty, don't validate it
      return true;
    }
    if (!is_numeric($value)) {
      return false;
    }
    $value = (float)$value;
    $result = true;
    if (isset($this->min)) {
      $result = $value >= $this->min;
    }
    if ($result && isset($this->max)) {
      $result = $value <= $this->max;
    }
    return $result;
  }

  /**
   * Setup specification params
   * @param array $params
   */
  public function setParams($params)
  {
    $this->min = isset($params['min']) ? (int)$params['min'] : null;
    $this->max = isset($params['max']) ? (int)$params['max'] : null;
  }

}