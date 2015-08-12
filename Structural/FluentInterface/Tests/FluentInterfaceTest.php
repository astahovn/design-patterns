<?php

Namespace DesignPatterns\Structural\FluentInterface\Tests;

use DesignPatterns\Structural\FluentInterface\Procedure\Procedure;

class FluentInterfaceTest extends \PHPUnit_Framework_TestCase
{

  public function testFluentInterface()
  {
    $procedure = new Procedure();
    $procedure
      ->setName('test')
      ->setPrice(100)
      ->setDescription('My test');

    $this->assertEquals('test', $procedure->getName());
    $this->assertEquals(100, $procedure->getPrice());
    $this->assertEquals('My test', $procedure->getDescription());
  }

}