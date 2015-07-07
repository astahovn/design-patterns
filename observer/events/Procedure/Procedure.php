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
  const EVENT_APPLIC_OPEN_START         = 3;  // начало вскрытия конвертов
  const EVENT_PROTOCOL_APPLIC_OPENED    = 4;  // публикация протокола вскрытия конвертов
  const EVENT_PROTOCOL_APPLIC_REVIEW    = 5;  // публикация протокола рассмотрения заявок
  const EVENT_PROTOCOL_SUMMING_UP       = 6;  // публикация протокола подведения итогов
  const EVENT_CONTRACT_START            = 7;  // начало этапа заключения договора
  const EVENT_ARCHIVE                   = 8;  // переход в архив

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
  public function publicate()
  {
    var_dump($this->name . ' - publicated');

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

}