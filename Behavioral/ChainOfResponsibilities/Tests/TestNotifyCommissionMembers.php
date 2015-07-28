<?php

Namespace DesignPatterns\Behavioral\ChainOfResponsibilities\Tests;

use DesignPatterns\Behavioral\ChainOfResponsibilities\Notifier\Notifier;

class TestNotifyCommissionMembers extends Notifier
{

  const TEST_ORGANIZER_MAIL = 'organizer@mock.com';
  const TEST_SOME_OTHER_USER_MAIL = 'someotheruser@mock.com';

  /**
   * @inheritdoc
   */
  protected function getEmailsToSend()
  {
    return [
      self::TEST_ORGANIZER_MAIL,
      self::TEST_SOME_OTHER_USER_MAIL
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