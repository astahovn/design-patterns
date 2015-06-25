<?php

/**
 * Interface Observable
 * Интерфейс наблюдаемого
 */
interface Observable {

  /**
   * Добавление наблюдателя для событий
   * @param Observer $observer
   * @param String[] $events
   */
  public function attach(Observer $observer, $events);

  /**
   * Удаление наблюдателя для событий
   * @param Observer $observer
   * @param String[] $events
   */
  public function detach(Observer $observer, $events);

  /**
   * Отправка сообщений наблюдателям
   * @param String $event
   * @param Array $data
   */
  public function notify($event, $data);

}