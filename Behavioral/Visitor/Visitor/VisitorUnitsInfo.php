<?php

Namespace DesignPatterns\Behavioral\Visitor\Visitor;

use DesignPatterns\Behavioral\Visitor\Procedure\UnitProduct;
use DesignPatterns\Behavioral\Visitor\Procedure\UnitService;

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
  public function visitProduct(UnitProduct $product)
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
  public function visitService(UnitService $service)
  {
    $this->products[] = sprintf(
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
   * Get final info about products and services
   * @return string
   */
  public function getInfo()
  {
    $result = "Products:\n" .
      implode("\n", $this->products) . "\n"  .
      "Services: \n"  .
      implode("\n", $this->services);

    return $result;
  }

}