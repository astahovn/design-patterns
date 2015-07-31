<?php

Namespace DesignPatterns\Behavioral\State\Tests;

use DesignPatterns\Behavioral\State\Procedure\Procedure;

/**
 * Class AppListTest
 *
 * Application list tests
 *
 * @package DesignPatterns\Behavioral\State\Tests
 */
class AppListTest extends \PHPUnit_Framework_TestCase
{

  /** @var Db $db */
  protected $db;

  /** @var Procedure $procedure */
  protected $procedure;

  /**
   * Setup test procedure
   */
  public function setUp()
  {
    $this->db = new Db();
    $this->procedure = new Procedure();
  }

  /**
   * Test of registration status
   * @throws \Exception
   */
  public function testRegistrationStatus()
  {
    $this->procedure->setStatus(Procedure::STATUS_REGISTRATION);

    $appList = $this->procedure->getAppList();

    $count = $appList->getCount();
    $this->assertInternalType('int', $count, 'It must be an integer');
    $this->assertEquals($this->db->doQueryCount(), $count, 'Count is not match');

    $list = $appList->getList();
    $this->assertInternalType('array', $list, 'It must be an array');
    $this->assertEmpty($list, 'No one can see applications at the registration status');
  }

  /**
   * Test of protocol status
   * @throws \Exception
   */
  public function testProtocolStatus()
  {
    $this->procedure->setStatus(Procedure::STATUS_PROTOCOL);

    $appList = $this->procedure->getAppList();

    $count = $appList->getCount();
    $this->assertInternalType('int', $count, 'It must be an integer');
    $this->assertEquals($this->db->doQueryCount(), $count, 'Count is not match');

    $list = $appList->getList();
    $this->assertInternalType('array', $list, 'It must be an array');
    // Let's assume that we are the customer, so there are may be applications
    $this->assertCount($count, $list, 'Applications count is not match');
  }

  /**
   * Test of archive status
   * @throws \Exception
   */
  public function testArchiveStatus()
  {
    $this->procedure->setStatus(Procedure::STATUS_ARCHIVE);

    $appList = $this->procedure->getAppList();

    $count = $appList->getCount();
    $this->assertInternalType('int', $count, 'It must be an integer');
    $this->assertEquals($this->db->doQueryCount(), $count, 'Count is not match');

    $list = $appList->getList();
    $this->assertInternalType('array', $list, 'It must be an array');
    $this->assertCount($count, $list, 'Applications count is not match');
  }

}