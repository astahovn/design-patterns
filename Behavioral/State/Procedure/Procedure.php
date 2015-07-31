<?php

Namespace DesignPatterns\Behavioral\State\Procedure;

use DesignPatterns\Behavioral\State\AppList\AppListInterface;
use DesignPatterns\Behavioral\State\AppList\AppListRegistration;
use DesignPatterns\Behavioral\State\AppList\AppListProtocol;
use DesignPatterns\Behavioral\State\AppList\AppListArchive;

/**
 * Class Procedure
 * @package DesignPatterns\Behavioral\State\Procedure
 */
class Procedure
{
  const STATUS_REGISTRATION = 1;
  const STATUS_PROTOCOL = 2;
  const STATUS_ARCHIVE = 3;

  /** @var int $status */
  protected $status;

  /**
   * Set procedure status
   * @param int $status
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }

  /**
   * Get application list object depends on procedure's status
   * @return AppListInterface
   * @throws \Exception
   */
  public function getAppList()
  {
    switch($this->status) {
      case self::STATUS_REGISTRATION:
        $appList = new AppListRegistration($this);
        break;

      case self::STATUS_PROTOCOL:
        $appList = new AppListProtocol($this);
        break;

      case self::STATUS_ARCHIVE:
        $appList = new AppListArchive($this);
        break;

      default:
        throw new \Exception('Unknown procedure status');
    }

    return $appList;
  }

}