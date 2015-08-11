<?php

Namespace DesignPatterns\Behavioral\Specification\Tests;

use DesignPatterns\Behavioral\Specification\Specification\AbstractSpecification;
use DesignPatterns\Behavioral\Specification\Specification\SpecificationFactory;
use DesignPatterns\Behavioral\Specification\Procedure\Procedure;

class SpecificationTest extends \PHPUnit_Framework_TestCase
{

  public function testInvalidValidator()
  {
    $this->setExpectedException('Exception', SpecificationFactory::ERROR_INVALID_VALIDATOR);
    SpecificationFactory::getSpecification('Lengths', ['max' => 5]);
  }

  public function testLengthValidator()
  {
    /** @var AbstractSpecification $field */
    $field = SpecificationFactory::getSpecification('Length', ['min' => 4]);
    $this->assertTrue($field->isSatisfiedBy(''));
    $this->assertFalse($field->isSatisfiedBy('One'));
    $this->assertTrue($field->isSatisfiedBy('Test'));
    $this->assertTrue($field->isSatisfiedBy('Some text.'));

    $field->setParams(['max' => 5]);
    $this->assertTrue($field->isSatisfiedBy(''));
    $this->assertTrue($field->isSatisfiedBy('One'));
    $this->assertTrue($field->isSatisfiedBy('Test'));
    $this->assertFalse($field->isSatisfiedBy('Some text.'));

    $field->setParams(['min' => 3, 'max' => 5]);
    $this->assertTrue($field->isSatisfiedBy(''));
    $this->assertFalse($field->isSatisfiedBy('Bz'));
    $this->assertTrue($field->isSatisfiedBy('Test'));
    $this->assertFalse($field->isSatisfiedBy('Some text.'));
  }

  /**
   * @param bool $expected
   * @param mixed $value
   * @dataProvider requiredProvider
   */
  public function testRequiredValidator($expected, $value)
  {
    $field = SpecificationFactory::getSpecification('Required');
    $this->assertEquals($expected, $field->isSatisfiedBy($value));
  }

  public function requiredProvider()
  {
    return [
      [false, null],
      [false, ''],
      [true, 0],
      [true, 'Some value'],
      [true, 123],
    ];
  }

  /**
   * @param bool $expected
   * @param mixed $value
   * @dataProvider rangeProvider
   */
  public function testRangeValidator($expected, $value)
  {
    $field = SpecificationFactory::getSpecification('Range', ['min' => 2, 'max' => 5]);
    $this->assertEquals($expected, $field->isSatisfiedBy($value));
  }

  public function rangeProvider()
  {
    return [
      [true, null],
      [false, 0],
      [false, 1],
      [true, 3],
      [true, 5],
      [false, 8],
    ];
  }

  /**
   * @param array $expected
   * @param array $data
   * @dataProvider procedureProvider
   */
  public function testProcedureValidation($expected, $data)
  {
    $procedure = new Procedure();
    $procedure->setData($data);
    $this->assertEquals($expected, $procedure->validate());
  }

  public function procedureProvider()
  {
    return [
      [
        ['success' => false, 'errors' => ['name', 'start_price']],
        ['name' => '', 'start_price' => null, 'description' => null]
      ],
      [
        ['success' => false, 'errors' => ['name', 'start_price', 'description']],
        ['name' => 'Test', 'start_price' => 0, 'description' => 'test']
      ],
      [
        ['success' => false, 'errors' => ['name', 'start_price']],
        ['name' => 'My Test procedure.........', 'start_price' => 100001, 'description' => 'Some test description']
      ],
      [
        ['success' => true],
        ['name' => 'My Test procedure', 'start_price' => 10, 'description' => 'Some test description']
      ]
    ];
  }

}