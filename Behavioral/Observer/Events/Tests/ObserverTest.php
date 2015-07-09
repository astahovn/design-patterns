<?php

require_once __DIR__ . '/../Observer/iObservable.php';
require_once __DIR__ . '/../Observer/Observable.php';
require_once __DIR__ . '/../Procedure/Procedure.php';

use Procedure\Procedure;

class ObserverTest extends \PHPUnit_Framework_TestCase
{

  const PROCEDURE_TEST_NAME = 'Test';

  /**
   * Тест метода attach
   */
  public function testAttach()
  {
    // Создаем наблюдателя
    $observer = $this->getMockBuilder('Observer\iObserver')
      ->setMethods(array('eventsListener'))
      ->getMock();

    // Ожидаем, что наблюдатель получит уведомления по двум событиям
    $observer->expects($this->exactly(2))
      ->method('eventsListener')
      ->withConsecutive(
        $this->equalTo(Procedure::EVENT_PUBLICATION),
        $this->equalTo(Procedure::EVENT_ARCHIVE)
      );

    $procedure = new Procedure();
    // Слушаем только 2 тестируемых события
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
   * Тест метода detach
   */
  public function testDetach()
  {
    // Создаем первого наблюдателя
    $observer1 = $this->getMockBuilder('Observer\iObserver')
      ->setMethods(array('eventsListener'))
      ->getMock();

    // Ожидаем, что наблюдатель получит одно уведомление
    $observer1->expects($this->once())
      ->method('eventsListener')
      ->with(
        $this->equalTo(Procedure::EVENT_PROTOCOL_PUBLISHED)
      );

    // Создаем второго наблюдателя
    $observer2 = $this->getMockBuilder('Observer\iObserver')
      ->setMethods(array('eventsListener'))
      ->getMock();

    // Ожидаем, что наблюдатель получит одно уведомление
    $observer2->expects($this->once())
      ->method('eventsListener')
      ->with(
        $this->equalTo(Procedure::EVENT_ARCHIVE)
      );

    $procedure = new Procedure();

    // Подключаем observer1 ко всем событиям
    $procedure->attach($observer1, [
      Procedure::EVENT_PUBLICATION,
      Procedure::EVENT_REGISTRATION_OVER,
      Procedure::EVENT_PROTOCOL_PUBLISHED,
      Procedure::EVENT_ARCHIVE
    ]);

    // Подключаем observer2 ко выборочным событиям
    $procedure->attach($observer2, [
      Procedure::EVENT_PUBLICATION,
      Procedure::EVENT_ARCHIVE
    ]);

    // Отключаем observer1 от лишних событий
    $procedure->detach($observer1, [
      Procedure::EVENT_PUBLICATION,
      Procedure::EVENT_REGISTRATION_OVER,
      Procedure::EVENT_ARCHIVE
    ]);

    // Отключаем observer2 от лишних событий
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
   * Тест метода notify
   */
  public function testNotify()
  {
    // Создаем наблюдателя
    $observer = $this->getMockBuilder('Observer\iObserver')
      ->setMethods(array('eventsListener'))
      ->getMock();

    // Ожидаем, что наблюдатель получит уведомления по двум событиям
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