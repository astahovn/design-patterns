<?php

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
}