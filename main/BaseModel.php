<?php
declare(strict_types=1);

abstract class BaseModel {
  protected BaseRepository $repository;

  public function __construct(BaseRepository $repository) {
    $this->repository = $repository;
  }

  abstract public function withMainView();
}
