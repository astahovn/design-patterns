<?php

Namespace DesignPatterns\Structural\Decorator\Procedure\Renderer;

use DesignPatterns\Structural\Decorator\Renderer\Decorator;

class RendererJson extends Decorator
{

  /**
   * Gets JSON representation of procedure
   */
  public function renderData()
  {
    return json_encode($this->wrapped->renderData());
  }

}