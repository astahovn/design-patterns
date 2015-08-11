<?php

Namespace DesignPatterns\Behavioral\Specification\Procedure;

use DesignPatterns\Behavioral\Specification\Specification\SpecificationFactory;
use DesignPatterns\Behavioral\Specification\Specification\SpecificationInterface;

/**
 * Class Procedure
 * It's a use case for specifications.
 * For simplicity validators don't return error messages, but only a status - success \ fail
 */
class Procedure
{

  protected $data = [];

  protected $fields = [
    'name' => [
      'Length' => ['min' => 5, 'max' => 25],
      'Required' => []
    ],
    'start_price' => [
      'Range' => ['min' => 1, 'max' => 100000],
      'Required' => []
    ],
    'description' => [
      'Length' => ['min' => 5]
    ]
  ];

  /**
   * Setup procedure data
   * @param array $data
   */
  public function setData($data)
  {
    $this->data = $data;
  }

  /**
   * Validate procedure data
   * @return array
   */
  public function validate()
  {
    $errorFields = [];
    foreach ($this->fields as $fieldName => $validators) {
      $validator = $this->getFieldSpecification($validators);
      if ($validator && !$validator->isSatisfiedBy($this->data[$fieldName])) {
        $errorFields[] = $fieldName;
      }
    }
    if (empty($errorFields)) {
      return ['success' => true];
    }
    return ['success' => false, 'errors' => $errorFields];
  }

  /**
   * Construct specification based on validators list
   * @param array $validators
   * @return SpecificationInterface|false
   * @throws \Exception
   */
  protected function getFieldSpecification($validators)
  {
    /** @var SpecificationInterface $spec */
    $spec = false;
    foreach ($validators as $validatorName => $validatorParams) {
      $currentValidator = SpecificationFactory::getSpecification($validatorName, $validatorParams);
      if ($spec) {
        $spec = $spec->plus($currentValidator);
      } else {
        $spec = $currentValidator;
      }
    }

    return $spec;
  }

}