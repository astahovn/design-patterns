<?php

Namespace DesignPatterns\Structural\Composite\Role;

class Role
{
  /** @var string[] $api */
  protected $api = [];
  /** @var Role[] $parentRoles */
  protected $parentRoles = [];

  /**
   * @param array $api
   */
  public function __construct(array $api = [])
  {
    $this->api = $api;
  }

  /**
   * Set parent roles which adds some more api's to the current role
   * @param array $parentRoles
   */
  public function setParents(array $parentRoles = [])
  {
    $this->parentRoles = $parentRoles;
  }

  /**
   * Get full api list which includes parents api
   * @return array
   */
  public function getApi()
  {
    $parentApi = [];
    if (count($this->parentRoles)) {
      foreach ($this->parentRoles as $parentRole) {
        $parentApi = array_merge($parentApi, $parentRole->getApi());
      }
    }
    $fullApi = array_merge($this->api, $parentApi);
    return array_unique($fullApi);
  }

}