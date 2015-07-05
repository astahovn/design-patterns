<?php

function __autoload($class) {
  require_once $class . '.php';
}

$procedure = new Procedure();
$procedure->saveDraft('Test 1');
$procedure->publicate();
$procedure->registrationOver();