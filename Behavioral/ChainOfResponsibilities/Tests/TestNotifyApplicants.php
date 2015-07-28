<?php

Namespace DesignPatterns\Behavioral\ChainOfResponsibilities\Tests;

use DesignPatterns\Behavioral\ChainOfResponsibilities\Notifier\Notifier;

class TestNotifyApplicants extends Notifier
{

  const TEST_APPLICANT_MAIL = 'applicant@mock.com';

  /**
   * @inheritdoc
   */
  protected function getEmailsToSend()
  {
    return [
      self::TEST_APPLICANT_MAIL
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