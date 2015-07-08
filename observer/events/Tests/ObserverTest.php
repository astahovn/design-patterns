<?php

require_once __DIR__.'/../Observer/iObservable.php';
require_once __DIR__.'/../Observer/Observable.php';
require_once __DIR__.'/../Procedure/Procedure.php';

use Procedure\Procedure;

class ObserverTest extends \PHPUnit_Framework_TestCase
{

  /**
   * Тестируем прослушивание заданных событий Наблюдателем
   */
  public function testEventsListener()
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
    $procedure->saveDraft('Test');
    $procedure->publish();
    $procedure->registrationOver();
    $procedure->publishProtocol();
    $procedure->archive();
  }

}