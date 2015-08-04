<?php

Namespace DesignPatterns\Behavioral\Visitor\Procedure;

class Service extends Unit
{

  /** @var int $specialistLevel */
  protected $specialistLevel;

  /**
   * @inheritdoc
   */
  public function __construct($data)
  {
    parent::__construct($data);
    $this->specialistLevel = $data['specialistLevel'];
  }

  /**
   * Getter
   * @return string
   */
  public function getSpecialistLevel()
  {
    return $this->specialistLevel;
  }

}