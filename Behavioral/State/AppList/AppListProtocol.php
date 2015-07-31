<?php

Namespace DesignPatterns\Behavioral\State\AppList;

/**
 * Class AppListProtocol
 *
 * At the protocol status anyone can see a count of applications, but the customer only can see applications
 *
 * @package DesignPatterns\Behavioral\State\AppList
 */
class AppListProtocol extends AppListBase implements AppListInterface
{
  /**
   * @inheritdoc
   */
  public function getCount()
  {
    // Anyone can see the count
    // [ we do DB request and get it ]
    return 3;
  }

  /**
   * @inheritdoc
   */
  public function getList()
  {
    // Let's imaging that we are the customer, and so return applications
    // [ otherwise return empty array ]
    return [
      [
        'name' => 'The First supplier Inc.',
        'price' => 100000
      ],
      [
        'name' => 'The Second supplier Inc.',
        'price' => 105000
      ]
    ];
  }

}