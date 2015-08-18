<?php

Namespace DesignPatterns\Structural\Composite\Tests;

use DesignPatterns\Structural\Composite\Role\Role;

class RoleTest extends \PHPUnit_Framework_TestCase
{

  public function testRole()
  {
    $user = new Role(['logout']);
    $admin = new Role(['users-list', 'procedures-list']);
    $systemAdmin = new Role(['block-user', 'remove-user']);
    $businessAdmin = new Role(['cancel-procedure', 'restore-procedure']);
    $financeAdmin = new Role(['finances-list']);

    $admin->setParents([$user]);
    $systemAdmin->setParents([$admin]);
    $businessAdmin->setParents([$admin, $financeAdmin]);

    $this->assertCount(1, $user->getApi());
    $this->assertCount(3, $admin->getApi());
    $this->assertCount(5, $systemAdmin->getApi());
    $this->assertCount(6, $businessAdmin->getApi());
  }

}