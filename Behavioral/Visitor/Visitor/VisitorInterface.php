<?php

Namespace DesignPatterns\Behavioral\Visitor\Visitor;

use DesignPatterns\Behavioral\Visitor\Procedure\UnitProduct;
use DesignPatterns\Behavioral\Visitor\Procedure\UnitService;

interface VisitorInterface
{

  /**
   * Product unit visitor
   * @param UnitProduct $product
   * @return mixed
   */
  public function visitProduct(UnitProduct $product);

  /**
   * Service unit visitor
   * @param UnitService $service
   * @return mixed
   */
  public function visitService(UnitService $service);

}