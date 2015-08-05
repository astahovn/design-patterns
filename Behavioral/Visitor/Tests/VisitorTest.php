<?php

Namespace DesignPatterns\Behavioral\Visitor\Tests;

use DesignPatterns\Behavioral\Visitor\Procedure\Procedure;
use DesignPatterns\Behavioral\Visitor\Procedure\Product;
use DesignPatterns\Behavioral\Visitor\Procedure\Service;

class VisitorTest extends \PHPUnit_Framework_TestCase
{

  public function testUnitsInfo()
  {
    $procedure = new Procedure();
    $procedure->addUnit(
      (new Product(['name' => 'PC', 'price' => 500, 'quantity' => 1, 'mark' => 'Mark II']))
    );
    $procedure->addUnit(
      (new Service(['name' => 'OS install', 'price' => 5, 'quantity' => 1, 'specialistLevel' => 5]))
    );
    $procedure->addUnit(
      (new Product(['name' => 'OS', 'price' => 10, 'quantity' => 1, 'mark' => 'Some OS']))
    );
    list($products, $services) = $procedure->getUnitsInfo();

    $this->assertCount(2, $products, 'Wrong products count');
    $this->assertCount(1, $services, 'Wrong services count');
  }

}