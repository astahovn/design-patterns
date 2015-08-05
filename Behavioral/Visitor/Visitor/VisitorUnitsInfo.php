<?php

Namespace DesignPatterns\Behavioral\Visitor\Visitor;

use DesignPatterns\Behavioral\Visitor\Procedure\Product;
use DesignPatterns\Behavioral\Visitor\Procedure\Service;

class VisitorUnitsInfo implements VisitorInterface
{

  /**
   * Representation templates
   */
  const TPL_PRODUCT = 'Name: %s (%s), cost: %f';
  const TPL_SERVICE = 'Name: %s (%s), cost: %f';

  /** @var string[] $products */
  protected $products = [];
  /** @var string[] $services */
  protected $services = [];

  /**
   * @inheritdoc
   */
  public function visitProduct(Product $product)
  {
    $this->products[] = sprintf(
      self::TPL_PRODUCT,
      $product->getName(),
      $product->getMark(),
      $product->getPrice() * $product->getQuantity()
    );
  }

  /**
   * @inheritdoc
   */
  public function visitService(Service $service)
  {
    $this->services[] = sprintf(
      self::TPL_PRODUCT,
      $service->getName(),
      $this->getSpecialistText($service->getSpecialistLevel()),
      $service->getPrice() * $service->getQuantity()
    );
  }

  /**
   * Specialists level presentation
   * @param int $level
   * @return string
   */
  protected function getSpecialistText($level)
  {
    if ($level < 3) {
      $result = 'Junior';
    } elseif ($level < 7) {
      $result = 'Middle';
    } else {
      $result = 'Senior';
    }
    return $result;
  }

  /**
   * Get products info list
   * @return array
   */
  public function getProductsList()
  {
    return $this->products;
  }

  /**
   * Get services info list
   * @return array
   */
  public function getServicesList()
  {
    return $this->services;
  }

}