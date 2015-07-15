<?php

Namespace DesignPatterns\Behavioral\Observer\Observer;

/**
 * Interface Observer
 */
interface iObserver
{

  /**
   * Events listener
   * @param string $event
   * @param array $data
   */
  public function eventsListener($event, $data);

}