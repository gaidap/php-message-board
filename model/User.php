<?php
class UserModel extends BaseModel {
  function register() {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if($post['submitRegister']) {
      $hashed_password = hash('sha256', $post['password']);
      $sanitized_email = filter_var($post['email'], FILTER_SANITIZE_EMAIL);
      $lastInsertedId;
      if($sanitized_email) {
        $lastInsertedId = $this->repository->insertUser($post['name'], $sanitized_email, $hashed_password);
      } else {
        Notification::notify('You must enter a valid E-Mail address.', 'error');
      }
      if ($lastInsertedId) {
        header("Location: " . ROOT_URL . '/users/login');
      }
    }
  }

  function login() {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if($post['submitLogin']) {
      $hashed_password = hash('sha256', $post['password']);
      $sanitized_email = filter_var($post['email'], FILTER_SANITIZE_EMAIL);
      $found_user = $this->repository->findUserByLogin($sanitized_email, $hashed_password);
      if($sanitized_email && !empty($found_user)) {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_data'] = array(
          "id" => $found_user['id'], 
          "email" => $found_user['email'], 
          "name" => $found_user['name'] 
        );
        header("Location: " . ROOT_URL);
      } else {
        Notification::notify('Invalid user name or password.', 'error');
      }
    }
  }

  function isFullview() {
    return true;
  }
}