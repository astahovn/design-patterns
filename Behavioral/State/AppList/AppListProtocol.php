<?php

Namespace DesignPatterns\Behavioral\State\AppList;

/**
 * Class AppListProtocol
 *
 * At the protocol status anyone can see a count of applications, but the customer only can see applications
 *
 * @package DesignPatterns\Behavioral\State\AppList
 */
class AppListProtocol extends AppListAbstract
{
  /**
   * @inheritdoc
   */
  public function getCount()
  {
    // Anyone can see the count
    // [ we do DB request and get it ]
    return $this->db->doQueryCount();
  }

  /**
   * @inheritdoc
   */
  public function getList()
  {
    // Let's imaging that we are the customer, and so return applications
    // [ otherwise return empty array ]
    return $this->db->doQuery();
  }

}