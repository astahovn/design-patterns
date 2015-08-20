<?php

Namespace DesignPatterns\Structural\Composite\Tests;

use DesignPatterns\Structural\Composite\Role\RolesFactory;

class RoleTest extends \PHPUnit_Framework_TestCase
{

  public function testRole()
  {
    $rolesConfig = [
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

    $rolesFactory = new RolesFactory();
    $rolesFactory->initRoles($rolesConfig);

    $this->assertCount(1, $rolesFactory->getApi('user'));
    $this->assertCount(3, $rolesFactory->getApi('admin'));
    $this->assertCount(5, $rolesFactory->getApi('systemAdmin'));
    $this->assertCount(6, $rolesFactory->getApi('businessAdmin'));
    $this->assertCount(4, $rolesFactory->getApi('financeAdmin'));
  }

}