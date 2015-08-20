<?php

Namespace DesignPatterns\Structural\Composite\Role;

class RolesFactory
{

  /** @var Role[] $roles */
  protected $roles = [];

  /**
   * Init roles by config
   * @param array $config
   *   [
   *     'user' => [
   *       'api' => ['logout'],
   *       'parents' => []
   *     ],
   *     'admin' => [
   *       'api' => ['users-list', 'procedures-list'],
   *       'parents' => ['user']
   *     ],
   *   ];
   *
   */
  public function initRoles($config)
  {
    // Init roles self APIs
    foreach ($config as $roleName => $roleData) {
      $this->roles[$roleName] = new Role($roleData['api']);
    }

    // Set roles parents
    foreach ($config as $roleName => $roleData) {
      $parents = [];
      foreach ($roleData['parents'] as $parent) {
        $parents[] = $this->roles[$parent];
      }
      $this->roles[$roleName]->setParents($parents);
    }
  }

  /**
   * Get role API
   * @param string $roleName
   * @return Role
   */
  public function getApi($roleName)
  {
    return $this->roles[$roleName]->getApi();
  }

}