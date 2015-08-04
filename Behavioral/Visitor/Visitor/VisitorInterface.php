<?php

Namespace DesignPatterns\Behavioral\Visitor\Visitor;

use DesignPatterns\Behavioral\Visitor\Procedure\Product;
use DesignPatterns\Behavioral\Visitor\Procedure\Service;

interface VisitorInterface
{

  /**
   * Product unit visitor
   * @param Product $product
   * @return mixed
   */
  public function visitProduct(Product $product);

  /**
   * Service unit visitor
   * @param Service $service
   * @return mixed
   */
  public function visitService(Service $service);

}