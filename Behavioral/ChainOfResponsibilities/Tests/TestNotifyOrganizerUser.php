<?php

Namespace DesignPatterns\Behavioral\ChainOfResponsibilities\Tests;

use DesignPatterns\Behavioral\ChainOfResponsibilities\Notifier\Notifier;

class TestNotifyOrganizerUser extends Notifier
{

  const TEST_ORGANIZER_MAIL = 'organizer@mock.com';

  /**
   * @inheritdoc
   */
  protected function getEmailsToSend()
  {
    return [
      self::TEST_ORGANIZER_MAIL
    ];
  }

  /**
   * @inheritdoc
   */
  protected function notify($email, $message)
  {
    return true;
  }

}