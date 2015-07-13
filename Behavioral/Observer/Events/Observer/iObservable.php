<?php

Namespace Observer;

/**
 * Interface Observable
 */
interface iObservable
{

  /**
   * Attach observer to a certain object events
   * @param iObserver $observer
   * @param array $events
   */
  public function attach(iObserver $observer, $events);

  /**
   * Detach observer from a certain events
   * @param iObserver $observer
   * @param array $events
   */
  public function detach(iObserver $observer, $events);

  /**
   * Notify observers
   * @param int|string $event
   * @param array $data
   */
  public function notify($event, $data);

}