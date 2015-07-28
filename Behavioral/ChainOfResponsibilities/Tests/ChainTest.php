<?php

Namespace DesignPatterns\Behavioral\ChainOfResponsibilities\Tests;

class ChainTest extends \PHPUnit_Framework_TestCase
{
  const NOTIFY_MESSAGE = 'Test notification message';

  /**
   * Test chain notifications
   */
  public function testChainNotifications()
  {
    // Depends on notifier's event generate the chain of responsible users
    // organizer@mock.com
    $chain = new TestNotifyOrganizerUser();
    // applicant@mock.com
    $chain->append(new TestNotifyApplicants());
    // organizer@mock.com (shouldn't send twice), someotheruser@mock.com
    $chain->append(new TestNotifyCommissionMembers());

    // Send a message to users
    $sentEmails = $chain->handle(self::NOTIFY_MESSAGE);

    // Check sent emails and their order
    $this->assertEquals(
      TestNotifyCommissionMembers::TEST_SOME_OTHER_USER_MAIL,
      array_pop($sentEmails),
      'Wrong email sent'
    );

    $this->assertEquals(
      TestNotifyApplicants::TEST_APPLICANT_MAIL,
      array_pop($sentEmails),
      'Wrong email sent'
    );

    $this->assertEquals(
      TestNotifyOrganizerUser::TEST_ORGANIZER_MAIL,
      array_pop($sentEmails),
      'Wrong email sent'
    );

    $this->assertEquals(
      0,
      count($sentEmails),
      'Unexpected emails count'
    );
  }

}