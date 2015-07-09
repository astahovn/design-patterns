<?php

Namespace Observer;

/**
 * Interface Observable
 * Интерфейс наблюдаемого
 */
interface iObservable
{

  /**
   * Добавление наблюдателя для событий
   * @param iObserver $observer
   * @param array $events
   */
  public function attach(iObserver $observer, $events);

  /**
   * Удаление наблюдателя для событий
   * @param iObserver $observer
   * @param array $events
   */
  public function detach(iObserver $observer, $events);

  /**
   * Отправка сообщений наблюдателям
   * @param int|string $event
   * @param array $data
   */
  public function notify($event, $data);

}