<?php

Namespace DesignPatterns\Behavioral\ChainOfResponsibilities\Tests;

use DesignPatterns\Behavioral\ChainOfResponsibilities\Notifier\Notifier;

require_once __DIR__ . '/../Notifier/Abstract.php';

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