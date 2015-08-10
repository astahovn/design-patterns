<?php

Namespace DesignPatterns\Behavioral\Specification\Tests;

use DesignPatterns\Behavioral\Specification\Specification\LengthSpecification;
use DesignPatterns\Behavioral\Specification\Specification\SpecificationFactory;

class SpecificationTest extends \PHPUnit_Framework_TestCase
{

  public function testInvalidValidator()
  {
    $this->setExpectedException('Exception', SpecificationFactory::ERROR_INVALID_VALIDATOR);
    SpecificationFactory::getSpecification('Lengths', ['max' => 5]);
  }

  public function testLengthValidator()
  {
    /** @var LengthSpecification $field */
    $field = SpecificationFactory::getSpecification('Length', ['min' => 4]);
    $this->assertFalse($field->isSatisfiedBy(''));
    $this->assertFalse($field->isSatisfiedBy('One'));
    $this->assertTrue($field->isSatisfiedBy('Test'));
    $this->assertTrue($field->isSatisfiedBy('Some text.'));

    $field->setParams(['max' => 5]);
    $this->assertTrue($field->isSatisfiedBy(''));
    $this->assertTrue($field->isSatisfiedBy('One'));
    $this->assertTrue($field->isSatisfiedBy('Test'));
    $this->assertFalse($field->isSatisfiedBy('Some text.'));

    $field->setParams(['min' => 3, 'max' => 5]);
    $this->assertFalse($field->isSatisfiedBy(''));
    $this->assertFalse($field->isSatisfiedBy('Bz'));
    $this->assertTrue($field->isSatisfiedBy('Test'));
    $this->assertFalse($field->isSatisfiedBy('Some text.'));
  }

}