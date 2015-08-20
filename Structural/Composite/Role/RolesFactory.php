<?php

Namespace DesignPatterns\Structural\Composite\Role;

class RolesFactory
{

  const ERROR_NONEXISTENT_PARENT = 'Wrong config: non-existent parent';

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
   * @throws \Exception
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
        if (isset($this->roles[$parent])) {
          $parents[] = $this->roles[$parent];
        } else {
          throw new \Exception(self::ERROR_NONEXISTENT_PARENT);
        }
      }
      $this->roles[$roleName]->setParents($parents);
    }
  }

  /**
   * Get role API
   * @param string $roleName
   * @return array|null
   */
  public function getApi($roleName)
  {
    return isset($this->roles[$roleName]) ? $this->roles[$roleName]->getApi() : null;
  }

}