<?php

Namespace DesignPatterns\Behavioral\Strategy\Tests;

use DesignPatterns\Behavioral\Strategy\Application\Application;
use DesignPatterns\Behavioral\Strategy\Company\Company;
use DesignPatterns\Behavioral\Strategy\Procedure\Procedure;
use DesignPatterns\Behavioral\Strategy\Blocker\FreeBlocker;
use DesignPatterns\Behavioral\Strategy\Blocker\BaseBlocker;
use DesignPatterns\Behavioral\Strategy\Blocker\SeriousBlocker;

class StrategyTest extends \PHPUnit_Framework_TestCase
{

  public function testCompanyDepositActions()
  {
    $company = new Company();
    $this->assertEquals(0, $company->getDeposit(), 'Deposit must be 0');

    $company->setDeposit(10000);
    $this->assertEquals(10000, $company->getDeposit(), 'Deposit must be 10000');
  }

  public function testProcedureStartPrice()
  {
    $procedure = new Procedure();
    $procedure->setStartPrice(70000);
    $this->assertEquals(70000, $procedure->getStartPrice(), 'Start price must be 70000');
  }

  public function testFreeParticipationBlock()
  {
    $company = new Company();
    $company->setDeposit(10000);

    $procedure = new Procedure();

    $app = new Application($company, $procedure);
    $app->blockMoney(new FreeBlocker());
    $this->assertEquals(10000, $company->getDeposit(), 'Deposit must be 10000');

    $app->unblockMoney(new FreeBlocker());
    $this->assertEquals(10000, $company->getDeposit(), 'Deposit must be 10000');
  }

  public function testBaseParticipationBlock()
  {
    $company = new Company();
    $company->setDeposit(10000);

    $procedure = new Procedure();

    $app = new Application($company, $procedure);
    $app->blockMoney(new BaseBlocker());
    $this->assertEquals(7000, $company->getDeposit(), 'Deposit must be 7000');

    $app->unblockMoney(new BaseBlocker());
    $this->assertEquals(10000, $company->getDeposit(), 'Deposit must be 10000');
  }

  public function testSeriousParticipationBlock()
  {
    $company = new Company();
    $company->setDeposit(10000);

    $procedure = new Procedure();
    $procedure->setStartPrice(100000);

    $app = new Application($company, $procedure);
    $app->blockMoney(new SeriousBlocker());
    $this->assertEquals(0, $company->getDeposit(), 'Deposit must be 0');

    $app->unblockMoney(new SeriousBlocker());
    $this->assertEquals(10000, $company->getDeposit(), 'Deposit must be 10000');
  }

}