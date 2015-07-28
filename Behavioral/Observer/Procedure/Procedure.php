<?php

Namespace DesignPatterns\Behavioral\Observer\Procedure;

use DesignPatterns\Behavioral\Observer\Observer\Observable;

/**
 * Class Procedure
 */
class Procedure extends Observable
{

  const EVENT_PUBLICATION = 1;  // trading procedure publication
  const EVENT_REGISTRATION_OVER = 2;  // applications registration is over
  const EVENT_PROTOCOL_PUBLISHED = 3;  // applications review protocol publication
  const EVENT_ARCHIVE = 4;  // procedure archive

  /**
   * Get the event human description
   * @param int $event
   * @return string
   */
  public static function getEventText($event)
  {
    $text = '';
    switch ($event) {
      case self::EVENT_PUBLICATION:
        $text = 'trading procedure publication';
        break;
      case self::EVENT_REGISTRATION_OVER:
        $text = 'applications registration is over';
        break;
      case self::EVENT_PROTOCOL_PUBLISHED:
        $text = 'applications review protocol publication';
        break;
      case self::EVENT_ARCHIVE:
        $text = 'procedure archive';
        break;
    }
    return $text;
  }

  /** @var string $name Название закупки */
  protected $name = '';

  /**
   * Save procedure draft (before it has published)
   * @param string $name
   * @return Procedure
   */
  public function saveDraft($name)
  {
    $this->name = $name;
    return $this;
  }

  /**
   * Get common events data
   * @return array
   */
  protected function getCommonEventData()
  {
    return [
      'name' => $this->name
    ];
  }

  /**
   * Trading procedure publication
   * @return Procedure
   */
  public function publish()
  {
    // publication code

    $this->notify(self::EVENT_PUBLICATION, $this->getCommonEventData());
    return $this;
  }

  /**
   * Applications registration is over
   * @return Procedure
   */
  public function registrationOver()
  {
    // registration over code

    $this->notify(self::EVENT_REGISTRATION_OVER, $this->getCommonEventData());
    return $this;
  }

  /**
   * Applications review protocol publication
   * @return Procedure
   */
  public function publishProtocol()
  {
    // protocol publication code

    $this->notify(self::EVENT_PROTOCOL_PUBLISHED, $this->getCommonEventData());
    return $this;
  }

  /**
   * Procedure archive
   * @return Procedure
   */
  public function archive()
  {
    // archive code

    $this->notify(self::EVENT_ARCHIVE, $this->getCommonEventData());
    return $this;
  }

}