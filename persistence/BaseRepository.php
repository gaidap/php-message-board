<?php
abstract class BaseRepository {
  protected $rdbms_connection;

  function __construct() {
    $this->rdbms_connection = new RdbmsConnection();
  }
}