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
    $sendedEmails = $chain->handle(self::NOTIFY_MESSAGE);

    // Check sended emails and their order
    $this->assertEquals(
      TestNotifyCommissionMembers::TEST_SOMEOTHERUSER_MAIL,
      array_pop($sendedEmails),
      'Wrong email sent'
    );

    $this->assertEquals(
      TestNotifyApplicants::TEST_APPLICANT_MAIL,
      array_pop($sendedEmails),
      'Wrong email sent'
    );

    $this->assertEquals(
      TestNotifyOrganizerUser::TEST_ORGANIZER_MAIL,
      array_pop($sendedEmails),
      'Wrong email sent'
    );

    $this->assertEquals(
      0,
      count($sendedEmails),
      'Unexpected emails count'
    );
  }

}