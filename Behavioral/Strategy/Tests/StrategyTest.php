<?php

Namespace Tests;

use Company\Company;

require_once __DIR__ . '/../Company/Company.php';

class StrategyTest extends \PHPUnit_Framework_TestCase
{

  public function testCompanyDepositActions()
  {
    $company = new Company();
    $this->assertEquals(0, $company->getDeposit(), 'Deposit must be 0');

    $company->setDeposit(10000);
    $this->assertEquals(10000, $company->getDeposit(), 'Deposit must be 10000');
  }

}