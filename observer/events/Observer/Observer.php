<?php

Namespace Observer;

/**
 * Interface Observer
 * Интерфейс наблюдателя
 */
interface Observer {

  /**
   * Обработчик события
   * @param string $event
   * @param array $data
   */
  public function eventsListener($event, $data);

}