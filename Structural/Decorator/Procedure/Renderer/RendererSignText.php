<?php

Namespace DesignPatterns\Structural\Decorator\Procedure\Renderer;

use DesignPatterns\Structural\Decorator\Renderer\Decorator;

class RendererSignText extends Decorator
{

  /**
   * Gets sign text for procedure publishing
   * @return string
   */
  public function renderData()
  {
    $procedureData = $this->wrapped->renderData();
    return "Procedure publishing: \n" .
      'Name: ' . $procedureData['name'] . "\n" .
      'Start price: ' . $procedureData['startPrice'] . "\n" .
      'Description: ' . $procedureData['description'];
  }

}