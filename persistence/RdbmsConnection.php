<?php
class RdbmsConnection {
  private $dbh;
  private $stmt;

  function __construct() {
    $options = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    $this->dbh = new PDO("mysql:host=" . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, $options);
  }

  function prepareQuery($query) {
    $this->stmt = $this->dbh->prepare($query);
  }

  private function determineParamType ($value) {
    $type;
    if (is_int($value)) {
      $type = PDO::PARAM_INT;
    } elseif (is_bool($value)) {
      $type = PDO::PARAM_BOOL;
    } elseif (is_string($value)) {
      $type = PDO::PARAM_STR;
    } else {
      $type = PDO::PARAM_NULL;
    }
    return $type;
  }

  function bindQueryParam($param, $value, $type = null) {
    if(is_null($type)) {
      $type = $this->determineParamType($value);
    }
    $this->stmt->bindValue($param, $value, $type);
  }

  function excecuteQuery() {
    return $this->stmt->execute();
  }

  function fetchLastInsertId() {
    return $this->dbh->lastInsertId();
  }

  function resultSet() {
    $this->stmt->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  function singleResult() {
    $this->stmt->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }
}