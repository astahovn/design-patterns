<?php

Namespace DesignPatterns\Behavioral\Observer\Notifier;

use DesignPatterns\Behavioral\Observer\Observer\iObserver;
use DesignPatterns\Behavioral\Observer\Procedure\Procedure as Proc;

class Procedure implements iObserver
{

  /**
   * Event listener
   * @param string $event
   * @param array $data
   */
  public function eventsListener($event, $data)
  {
    $eventText = Proc::getEventText($event);
    var_dump("Procedure notifier: {$data['name']} -> {$eventText}");
  }

}