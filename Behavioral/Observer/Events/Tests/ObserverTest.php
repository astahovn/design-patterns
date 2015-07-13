<?php

require_once __DIR__ . '/../Observer/iObservable.php';
require_once __DIR__ . '/../Observer/Observable.php';
require_once __DIR__ . '/../Procedure/Procedure.php';

use Procedure\Procedure;

class ObserverTest extends \PHPUnit_Framework_TestCase
{

  const PROCEDURE_TEST_NAME = 'Test';

  /**
   * Test attach method
   */
  public function testAttach()
  {
    // Generate observer
    $observer = $this->getMockBuilder('Observer\iObserver')
      ->setMethods(array('eventsListener'))
      ->getMock();

    // Expects that observer gets two events
    $observer->expects($this->exactly(2))
      ->method('eventsListener')
      ->withConsecutive(
        $this->equalTo(Procedure::EVENT_PUBLICATION),
        $this->equalTo(Procedure::EVENT_ARCHIVE)
      );

    $procedure = new Procedure();
    // Listen two needed events
    $procedure->attach($observer, [
      Procedure::EVENT_PUBLICATION,
      Procedure::EVENT_ARCHIVE
    ]);
    $procedure->saveDraft(self::PROCEDURE_TEST_NAME)
      ->publish()
      ->registrationOver()
      ->publishProtocol()
      ->archive();
  }

  /**
   * Test detach method
   */
  public function testDetach()
  {
    // Generate first observer
    $observer1 = $this->getMockBuilder('Observer\iObserver')
      ->setMethods(array('eventsListener'))
      ->getMock();

    // First observer should get only one event
    $observer1->expects($this->once())
      ->method('eventsListener')
      ->with(
        $this->equalTo(Procedure::EVENT_PROTOCOL_PUBLISHED)
      );

    // Generate second observer
    $observer2 = $this->getMockBuilder('Observer\iObserver')
      ->setMethods(array('eventsListener'))
      ->getMock();

    // Second observer should get one event
    $observer2->expects($this->once())
      ->method('eventsListener')
      ->with(
        $this->equalTo(Procedure::EVENT_ARCHIVE)
      );

    $procedure = new Procedure();

    // First observer listens all possible events
    $procedure->attach($observer1, [
      Procedure::EVENT_PUBLICATION,
      Procedure::EVENT_REGISTRATION_OVER,
      Procedure::EVENT_PROTOCOL_PUBLISHED,
      Procedure::EVENT_ARCHIVE
    ]);

    // Second observer listens two randomly events
    $procedure->attach($observer2, [
      Procedure::EVENT_PUBLICATION,
      Procedure::EVENT_ARCHIVE
    ]);

    // Detach unwanted events from the first observer
    $procedure->detach($observer1, [
      Procedure::EVENT_PUBLICATION,
      Procedure::EVENT_REGISTRATION_OVER,
      Procedure::EVENT_ARCHIVE
    ]);

    // Detach unwanted event from the second observer
    $procedure->detach($observer2, [
      Procedure::EVENT_PUBLICATION
    ]);

    $procedure->saveDraft(self::PROCEDURE_TEST_NAME)
      ->publish()
      ->registrationOver()
      ->publishProtocol()
      ->archive();
  }

  /**
   * Test notify method
   */
  public function testNotify()
  {
    // Generate observer
    $observer = $this->getMockBuilder('Observer\iObserver')
      ->setMethods(array('eventsListener'))
      ->getMock();

    // Expects that observer gets only one event with a certain data
    $observer->expects($this->once())
      ->method('eventsListener')
      ->with(
        $this->equalTo(Procedure::EVENT_PUBLICATION),
        ['name' => self::PROCEDURE_TEST_NAME]
      );

    $procedure = new Procedure();
    $procedure->attach($observer, [
      Procedure::EVENT_PUBLICATION
    ]);
    $procedure->saveDraft(self::PROCEDURE_TEST_NAME)
      ->publish()
      ->registrationOver()
      ->publishProtocol()
      ->archive();
  }

}