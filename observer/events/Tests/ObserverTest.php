<?php

require_once __DIR__.'/../Observer/iObservable.php';
require_once __DIR__.'/../Observer/Observable.php';
require_once __DIR__.'/../Procedure/Procedure.php';

use Procedure\Procedure;

class ObserverTest extends \PHPUnit_Framework_TestCase
{

  public function testPublish()
  {
    $procedure = new Procedure();
    $procedure->saveDraft('Test');
    $procedure->publish();
    $this->expectOutputString("Test - published\n");
  }

}