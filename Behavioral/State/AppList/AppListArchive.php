<?php

Namespace DesignPatterns\Behavioral\State\AppList;

/**
 * Class AppListArchive
 *
 * At the archive status anyone can see a count of applications and applications itself
 *
 * @package DesignPatterns\Behavioral\State\AppList
 */
class AppListArchive extends AppListBase implements AppListInterface
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
    // Anyone can see applications
    // [ we do DB request and get it ]
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