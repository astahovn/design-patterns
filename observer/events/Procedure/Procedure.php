<?php

Namespace Procedure;

use Observer\Observable;

/**
 * Class Procedure
 * Класс закупки реализующей интерфейс наблюдаемого объекта
 */
class Procedure extends Observable {

  const EVENT_PUBLICATION               = 1;  // публикация закупки
  const EVENT_REGISTRATION_OVER         = 2;  // окончание приема заявок
  const EVENT_PROTOCOL_PUBLISHED        = 3;  // публикация протокола рассмотрения заявок
  const EVENT_ARCHIVE                   = 4;  // переход в архив

  /**
   * Получение текста события
   * @param int $event
   * @return string
   */
  public static function getEventText($event)
  {
    $text = '';
    switch($event) {
      case self::EVENT_PUBLICATION:
        $text = 'публикация закупки';
        break;
      case self::EVENT_REGISTRATION_OVER:
        $text = 'окончание приема заявок';
        break;
      case self::EVENT_PROTOCOL_PUBLISHED:
        $text = 'публикация протокола рассмотрения заявок';
        break;
      case self::EVENT_ARCHIVE:
        $text = 'переход в архив';
        break;
    }
    return $text;
  }

  /** @var string $name Название закупки */
  protected $name = '';

  public function saveDraft($name)
  {
    $this->name = $name;
  }

  /**
   * Получение общих для всех ивентов данных
   * @return array
   */
  protected function getCommonEventData()
  {
    return [
      'name' => $this->name
    ];
  }

  /**
   * Публикация закупки
   */
  public function publish()
  {
    var_dump($this->name . ' - published');

    $this->notify(self::EVENT_PUBLICATION, $this->getCommonEventData());
  }

  /**
   * Окончание приема заявок на участие в закупке
   */
  public function registrationOver()
  {
    var_dump($this->name . ' - registration is over');

    $this->notify(self::EVENT_REGISTRATION_OVER, $this->getCommonEventData());
  }

  /**
   * Публикация протокола рассмотрения заявок
   */
  public function publishProtocol()
  {
    var_dump($this->name . ' - published protocol');

    $this->notify(self::EVENT_PROTOCOL_PUBLISHED, $this->getCommonEventData());
  }

  /**
   * Переход закупки в Архив
   */
  public function archive()
  {
    var_dump($this->name . ' - archived');

    $this->notify(self::EVENT_ARCHIVE, $this->getCommonEventData());
  }

}