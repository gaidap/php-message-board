<?php
class UserRepository extends BaseRepository {
  function fetchAllUsers() {
    $this->rdbms_connection->prepareQuery('SELECT * FROM users');
    return  $this->rdbms_connection->resultSet();
  }

  function insertUser($name, $email, $password) {
    $this->rdbms_connection->prepareQuery('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
    $this->rdbms_connection->bindQueryParam(':name', $name);
    $this->rdbms_connection->bindQueryParam(':email', $email);
    $this->rdbms_connection->bindQueryParam(':password', $password);
    $this->rdbms_connection->excecuteQuery();
    return $this->rdbms_connection->fetchLastInsertId();
  } 

  function findUserByLogin($email, $password) {
    $this->rdbms_connection->prepareQuery('SELECT * FROM users WHERE email = :email AND password = :password');
    $this->rdbms_connection->bindQueryParam(':email', $email);
    $this->rdbms_connection->bindQueryParam(':password', $password);
    return $this->rdbms_connection->singleResult();
  }
  
  function findUserByEmail($email) {
    $this->rdbms_connection->prepareQuery('SELECT * FROM users WHERE email = :email');
    $this->rdbms_connection->bindQueryParam(':email', $email);
    return $this->rdbms_connection->singleResult();
  } 
}