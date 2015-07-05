<?php

/**
 * Interface Observable
 * Интерфейс наблюдаемого
 */
interface iObservable {

  /**
   * Добавление наблюдателя для событий
   * @param Observer $observer
   * @param array $events
   */
  public function attach(Observer $observer, $events);

  /**
   * Удаление наблюдателя для событий
   * @param Observer $observer
   * @param array $events
   */
  public function detach(Observer $observer, $events);

  /**
   * Отправка сообщений наблюдателям
   * @param int|string $event
   * @param array $data
   */
  public function notify($event, $data);

}