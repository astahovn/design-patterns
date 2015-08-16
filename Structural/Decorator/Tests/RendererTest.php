<?php

Namespace DesignPatterns\Structural\Decorator\Tests;

use DesignPatterns\Structural\Decorator\Procedure\Procedure;
use DesignPatterns\Structural\Decorator\Procedure\Renderer\RendererJson;
use DesignPatterns\Structural\Decorator\Procedure\Renderer\RendererSignText;

class RendererTest extends \PHPUnit_Framework_TestCase
{

  const PROCEDURE_NAME = 'My test name';
  const PROCEDURE_START_PRICE = 15000;
  const PROCEDURE_DESCRIPTION = 'My test description';

  /** @var Procedure $procedure */
  protected $procedure;

  public function setUp()
  {
    $this->procedure = new Procedure([
      'name' => self::PROCEDURE_NAME,
      'startPrice' => self::PROCEDURE_START_PRICE,
      'description' => self::PROCEDURE_DESCRIPTION
    ]);
  }

  /**
   * Test JSON procedure data representation
   */
  public function testRendererJson()
  {
    $procedure = new RendererJson($this->procedure);

    $procedureJsonData = $procedure->renderData();
    $this->assertInternalType('string', $procedureJsonData, 'Expected JSON string');

    $procedureArr = json_decode($procedureJsonData, true);
    $this->assertEquals(self::PROCEDURE_NAME, $procedureArr['name']);
    $this->assertEquals(self::PROCEDURE_START_PRICE, $procedureArr['startPrice']);
    $this->assertEquals(self::PROCEDURE_DESCRIPTION, $procedureArr['description']);
  }

  /**
   * Test of procedure sign text generation
   */
  public function testRendererSignText()
  {
    $procedure = new RendererSignText($this->procedure);

    $signText = $procedure->renderData();
    $this->assertInternalType('string', $signText, 'Expected sign text');

    $this->assertRegExp('/(' . self::PROCEDURE_NAME . ')+/i', $signText, 'Sign text must contain procedure name');
    $this->assertRegExp('/(' . self::PROCEDURE_START_PRICE . ')+/i', $signText, 'Sign text must contain start price');
    $this->assertRegExp('/(' . self::PROCEDURE_DESCRIPTION . ')+/i', $signText, 'Sign text must contain description');
  }

}