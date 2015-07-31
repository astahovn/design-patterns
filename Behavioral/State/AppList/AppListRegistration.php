<?php

Namespace DesignPatterns\Behavioral\State\AppList;

/**
 * Class AppListRegistration
 *
 * At the registration status anyone can only see a count of applications and not applications itself
 *
 * @package DesignPatterns\Behavioral\State\AppList
 */
class AppListRegistration extends AppListBase implements AppListInterface
{
  /**
   * @inheritdoc
   */
  public function getCount()
  {
    // We can see the count
    // [ we do DB request and get it ]
    return 3;
  }

  /**
   * @inheritdoc
   */
  public function getList()
  {
    // We can not see applications
    // [ return just empty list ]
    return [];
  }

}