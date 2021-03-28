<?php
class RdbmsConnection {
  private $dbh;
  private $stmt;

  function __construct() {
    $this->dbh = new PDO("mysql:host=" . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
  }
}