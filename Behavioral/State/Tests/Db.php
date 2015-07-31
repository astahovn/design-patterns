<?php

Namespace DesignPatterns\Behavioral\State\Tests;

use DesignPatterns\Behavioral\State\Db\DbInterface;

/**
 * Class Db
 *
 * Fixture Db class
 *
 * @package DesignPatterns\Behavioral\State\Tests
 */
class Db implements DbInterface
{

  /**
   * Test fixture
   * @return array
   */
  private function getFixture()
  {
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

  /**
   * @inheritdoc
   */
  public function doQueryCount()
  {
    return count($this->getFixture());
  }

  /**
   * @inheritdoc
   */
  public function doQuery()
  {
    return $this->getFixture();
  }

}