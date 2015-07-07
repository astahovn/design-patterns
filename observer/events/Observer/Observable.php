<?php

Namespace Observer;

/**
 * Class Observable
 * Реализация логики Наблюдаемого
 */
class Observable implements iObservable {

  protected $events = array();

  /**
   * Добавление наблюдателя для событий
   * @param Observer $observer
   * @param array $events
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
   * @param array $events
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
   * @param int|string $event
   * @param array $data
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