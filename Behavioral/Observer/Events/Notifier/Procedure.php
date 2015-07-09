<?php

Namespace Notifier;

use Observer\iObserver;
use Procedure\Procedure as Proc;

class Procedure implements iObserver
{

  /**
   * Обработчик события
   * @param string $event
   * @param array $data
   */
  public function eventsListener($event, $data)
  {
    $eventText = Proc::getEventText($event);
    var_dump("Procedure notifier: {$data['name']} -> {$eventText}");
  }

}