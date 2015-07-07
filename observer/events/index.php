<?php

function __autoload($class) {
  $class = str_replace('\\', '/', $class);
  require_once $class . '.php';
}

use Procedure\Procedure;

$procedure = new Procedure();
$procedure->saveDraft('Test 1');
$procedure->publicate();
$procedure->registrationOver();