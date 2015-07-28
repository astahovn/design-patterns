<?php

Namespace DesignPatterns\Behavioral\ChainOfResponsibilities\Notifier;

abstract class Notifier
{

  /** @var Notifier $successor */
  protected $successor;

  /**
   * Append notifier to a chain
   * @param Notifier $notifier
   */
  public function append(Notifier $notifier)
  {
    if (is_null($this->successor)) {
      $this->successor = $notifier;
    } else {
      $this->successor->append($notifier);
    }
  }

  /**
   * Run notification process through a chain
   * @param string $message
   * @param array $sentEmails
   * @return array
   */
  public function handle($message, $sentEmails = [])
  {
    $emailsToSend = $this->getEmailsToSend();
    $sent = [];
    foreach($emailsToSend as $email) {
      if (!in_array($email, $sentEmails, true)) {
        $this->notify($email, $message);
        $sent[] = $email;
      }
    }
    $sentEmails = array_merge($sentEmails, $sent);

    if (!is_null($this->successor)) {
      return $this->successor->handle($message, $sentEmails);
    }

    return $sentEmails;
  }

  /**
   * Get emails to send
   * @return array
   */
  abstract protected function getEmailsToSend();

  /**
   * Send email
   * @param string $email
   * @param string $message
   * @return bool
   */
  abstract protected function notify($email, $message);
}