<?php

Namespace Observer;

/**
 * Interface Observer
 * Интерфейс наблюдателя
 */
interface iObserver {

  /**
   * Обработчик события
   * @param string $event
   * @param array $data
   */
  public function eventsListener($event, $data);

}