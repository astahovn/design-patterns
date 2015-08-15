<?php

Namespace DesignPatterns\Structural\DependencyInjection\Tests;

use DesignPatterns\Structural\DependencyInjection\Config\ArrayConfig;
use DesignPatterns\Structural\DependencyInjection\Config\DbConfig;
use DesignPatterns\Structural\DependencyInjection\Procedure\Procedure;

class DependencyInjectionTest extends \PHPUnit_Framework_TestCase
{

  public function testProcedureConfig()
  {
    $arrayConfig = new ArrayConfig(require 'config.php');
    $procedure = new Procedure($arrayConfig);
    $this->assertFalse($procedure->isDocsEnabled(), 'Array config disable documents using');

    $dbConfig = new DbConfig([]);
    $procedure->setConfig($dbConfig);
    $this->assertTrue($procedure->isDocsEnabled(), 'Db (test) config allows whatever it is');
  }

}