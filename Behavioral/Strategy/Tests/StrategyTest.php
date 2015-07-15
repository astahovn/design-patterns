<?php

Namespace Tests;

use Application\Application;
use Company\Company;
use Procedure\Procedure;
use Blocker\FreeBlocker;
use Blocker\BaseBlocker;
use Blocker\SeriousBlocker;

require_once __DIR__ . '/../Company/Company.php';
require_once __DIR__ . '/../Procedure/Procedure.php';
require_once __DIR__ . '/../Application/Application.php';
require_once __DIR__ . '/../Blocker/Interface.php';
require_once __DIR__ . '/../Blocker/Free.php';
require_once __DIR__ . '/../Blocker/Base.php';
require_once __DIR__ . '/../Blocker/Serious.php';

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