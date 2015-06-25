<?php

/**
 * Interface Observer
 * Интерфейс наблюдателя
 */
interface Observer {

  /**
   * Обработчик события
   * @param String $event
   * @param Array $data
   */
  public function eventsListener($event, $data);

}