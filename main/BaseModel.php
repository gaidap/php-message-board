<?php
abstract class BaseModel {
  protected $repository;

  function __construct($repository) {
    $this->repository = $repository;
  }

  abstract function withMainview();
}