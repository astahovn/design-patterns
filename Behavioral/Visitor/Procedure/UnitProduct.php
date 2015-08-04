<?php

Namespace DesignPatterns\Behavioral\Visitor\Procedure;

class UnitProduct extends Unit
{

  /** @var string $mark */
  protected $mark;

  /**
   * @inheritdoc
   */
  public function __construct($data)
  {
    parent::__construct($data);
    $this->mark = $data['mark'];
  }

  /**
   * Getter
   * @return string
   */
  public function getMark()
  {
    return $this->mark;
  }

}