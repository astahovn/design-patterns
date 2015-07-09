<?php

function __autoload($class)
{
  $class = str_replace('\\', '/', $class);
  require_once $class . '.php';
}

use Procedure\Procedure;
use Logger\Procedure as LoggerProcedure;
use Notifier\Procedure as NotifierProcedure;

$procedure = new Procedure();

$procedure->attach(new LoggerProcedure(), [
  Procedure::EVENT_PUBLICATION,
  Procedure::EVENT_REGISTRATION_OVER,
  Procedure::EVENT_PROTOCOL_PUBLISHED,
  Procedure::EVENT_ARCHIVE
]);

$procedure->attach(new NotifierProcedure(), [
  Procedure::EVENT_PROTOCOL_PUBLISHED
]);

$procedure->saveDraft('Test 1')
  ->publish()
  ->registrationOver()
  ->publishProtocol()
  ->archive();
