<?php

Namespace Procedure;

use Observer\Observable;

/**
 * Class Procedure
 * Класс закупки реализующей интерфейс наблюдаемого объекта
 */
class Procedure extends Observable
{

  const EVENT_PUBLICATION = 1;  // публикация закупки
  const EVENT_REGISTRATION_OVER = 2;  // окончание приема заявок
  const EVENT_PROTOCOL_PUBLISHED = 3;  // публикация протокола рассмотрения заявок
  const EVENT_ARCHIVE = 4;  // переход в архив

  /**
   * Получение текста события
   * @param int $event
   * @return string
   */
  public static function getEventText($event)
  {
    $text = '';
    switch ($event) {
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

  /**
   * Сохранение черновика закупки
   * @param string $name
   * @return Procedure
   */
  public function saveDraft($name)
  {
    $this->name = $name;
    return $this;
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
   * @return Procedure
   */
  public function publish()
  {
    print($this->name . " - published\n");

    $this->notify(self::EVENT_PUBLICATION, $this->getCommonEventData());
    return $this;
  }

  /**
   * Окончание приема заявок на участие в закупке
   * @return Procedure
   */
  public function registrationOver()
  {
    print($this->name . " - registration is over\n");

    $this->notify(self::EVENT_REGISTRATION_OVER, $this->getCommonEventData());
    return $this;
  }

  /**
   * Публикация протокола рассмотрения заявок
   * @return Procedure
   */
  public function publishProtocol()
  {
    print($this->name . " - published protocol\n");

    $this->notify(self::EVENT_PROTOCOL_PUBLISHED, $this->getCommonEventData());
    return $this;
  }

  /**
   * Переход закупки в Архив
   * @return Procedure
   */
  public function archive()
  {
    print($this->name . " - archived\n");

    $this->notify(self::EVENT_ARCHIVE, $this->getCommonEventData());
    return $this;
  }

}