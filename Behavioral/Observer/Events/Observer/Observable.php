<?php

Namespace Observer;

/**
 * Class Observable
 */
class Observable implements iObservable
{

  protected $events = [];

  /**
   * Attach observer to a certain object events
   * @param iObserver $observer
   * @param array $events
   */
  public function attach(iObserver $observer, $events)
  {
    foreach ($events as $event) {
      if (!array_key_exists($event, $this->events)) {
        $this->events[$event] = [];
      }
      $this->events[$event][] = $observer;
    }
  }

  /**
   * Detach observer from a certain events
   * @param iObserver $observer
   * @param array $events
   */
  public function detach(iObserver $observer, $events)
  {
    foreach ($events as $event) {
      if (array_key_exists($event, $this->events)) {
        $newObservers = [];
        foreach ($this->events[$event] as $obs) {
          if ($obs != $observer) {
            $newObservers[] = $obs;
          }
        }
        $this->events[$event] = $newObservers;
      }
    }
  }

  /**
   * Notify observers
   * @param int|string $event
   * @param array $data
   */
  public function notify($event, $data)
  {
    if (array_key_exists($event, $this->events)) {
      /** @var iObserver $observer */
      foreach ($this->events[$event] as $observer) {
        $observer->eventsListener($event, $data);
      }
    }
  }

}