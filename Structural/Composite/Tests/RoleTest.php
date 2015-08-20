<?php

Namespace DesignPatterns\Structural\Composite\Tests;

use DesignPatterns\Structural\Composite\Role\RolesFactory;

class RoleTest extends \PHPUnit_Framework_TestCase
{
  /** @var array $rolesConfig */
  protected $rolesConfig = [];

  public function setUp()
  {
    $this->rolesConfig = [
      'user' => [
        'api' => ['logout'],
        'parents' => []
      ],
      'admin' => [
        'api' => ['users-list', 'procedures-list'],
        'parents' => ['user']
      ],
      'systemAdmin' => [
        'api' => ['block-user', 'remove-user'],
        'parents' => ['admin']
      ],
      'businessAdmin' => [
        'api' => ['cancel-procedure', 'restore-procedure'],
        'parents' => ['admin', 'financeAdmin']
      ],
      'financeAdmin' => [
        'api' => ['finances-list'],
        'parents' => ['admin']
      ],
    ];
  }

  /**
   * Test roles initialization and getting APIs
   */
  public function testRole()
  {
    $rolesFactory = new RolesFactory();
    $rolesFactory->initRoles($this->rolesConfig);

    $this->assertCount(1, $rolesFactory->getApi('user'));
    $this->assertCount(3, $rolesFactory->getApi('admin'));
    $this->assertCount(5, $rolesFactory->getApi('systemAdmin'));
    $this->assertCount(6, $rolesFactory->getApi('businessAdmin'));
    $this->assertCount(4, $rolesFactory->getApi('financeAdmin'));
  }

  /**
   * Test getting wrong role API
   */
  public function testWrongRole()
  {
    $rolesFactory = new RolesFactory();
    $rolesFactory->initRoles($this->rolesConfig);

    $this->assertNull($rolesFactory->getApi('wrongRole'));
  }

  /**
   * Test wrong config: setup non-existent parent
   */
  public function testNonExistentParent()
  {
    $this->rolesConfig['financeAdmin']['parents'] = ['adminBar'];

    $this->setExpectedException('Exception', RolesFactory::ERROR_NONEXISTENT_PARENT);

    $rolesFactory = new RolesFactory();
    $rolesFactory->initRoles($this->rolesConfig);
  }

}