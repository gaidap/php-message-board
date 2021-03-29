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

    if ($this->rdbms_connection->fetchLastInsertId()) {
      header("Location: " . ROOT_URL . '/users/login');
    }
  } 

  function checkUserLogin($email, $password) {
    $this->rdbms_connection->prepareQuery('SELECT * FROM users WHERE email = :email AND password = :password');
    $this->rdbms_connection->bindQueryParam(':email', $email);
    $this->rdbms_connection->bindQueryParam(':password', $password);
    $found_user = $this->rdbms_connection->resultSet();
    if(empty($found_user)) {
      die('Invalid email or password.');
    } else {
      header("Location: " . ROOT_URL);
    }
  } 
}