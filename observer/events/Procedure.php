<?php

/**
 * Class Procedure
 * Класс закупки реализующей интерфейс наблюдаемого объекта
 */
class Procedure implements Observable {

  const EVENT_PUBLICATION               = 1;  // публикация закупки
  const EVENT_REGISTRATION_OVER         = 2;  // окончание приема заявок
  const EVENT_APPLIC_OPEN_START         = 3;  // начало вскрытия конвертов
  const EVENT_PROTOCOL_APPLIC_OPENED    = 4;  // публикация протокола вскрытия конвертов
  const EVENT_PROTOCOL_APPLIC_REVIEW    = 5;  // публикация протокола рассмотрения заявок
  const EVENT_PROTOCOL_SUMMING_UP       = 6;  // публикация протокола подведения итогов
  const EVENT_CONTRACT_START            = 7;  // начало этапа заключения договора
  const EVENT_ARCHIVE                   = 8;  // переход в архив

  protected $events = array();

  /**
   * Добавление наблюдателя для событий
   * @param Observer $observer
   * @param String[] $events
   */
  public function attach(Observer $observer, $events)
  {
    foreach($events as $event) {
      if (!array_key_exists($event, $this->events)) {
        $this->events[$event] = array();
      }
      $this->events[$event][] = $observer;
    }
  }

  /**
   * Удаление наблюдателя для событий
   * @param Observer $observer
   * @param String[] $events
   */
  public function detach(Observer $observer, $events)
  {
    foreach($events as $event) {
      if (array_key_exists($event, $this->events)) {
        $newObservers = array();
        foreach($this->events[$event] as $obs) {
          if ($obs != $observer) {
            $newObservers[] = $obs;
          }
        }
        $this->events[$event] = $newObservers;
      }
    }
  }

  /**
   * Отправка сообщений наблюдателям
   * @param String $event
   * @param Array $data
   */
  public function notify($event, $data)
  {
    if (array_key_exists($event, $this->events)) {
      /** @var Observer $observer */
      foreach($this->events[$event] as $observer) {
        $observer->eventsListener($event, $data);
      }
    }
  }

}