<?php
class UserModel extends BaseModel {
  function register() {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if($post['submitRegister']) {
      $hashed_password = hash('sha256', $post['password']);
      $sanitized_email = filter_var($post['email'], FILTER_SANITIZE_EMAIL);
      if($sanitized_email) {
        $this->repository->insertUser($post['name'], $sanitized_email, $hashed_password);
      } else {
        die('You must enter a valid E-Mail address.');
      }
    }
  }

  function login() {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if($post['submitLogin']) {
      $hashed_password = hash('sha256', $post['password']);
      $sanitized_email = filter_var($post['email'], FILTER_SANITIZE_EMAIL);
      if($sanitized_email) {
        $this->repository->checkUserLogin($sanitized_email, $hashed_password);
      } else {
        die('You must enter a valid E-Mail address.');
      }
    }
  }

  function isFullview() {
    return true;
  }
}