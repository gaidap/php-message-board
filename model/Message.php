<?php
class MessageModel extends BaseModel {

  function index() {
    if($_POST['deleteMessage']) {
      $this->repository->deleteMessage($_POST['messageId'], $_SESSION['user_data']['id']);
    }
    return $this->repository->fetchAllMessages();
  }

  function add() {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if($post['submitMessage']) {
      $sanitized_url = filter_var($post['link'], FILTER_SANITIZE_URL);
      $lastInsertedId = $this->repository->insertMessage($_SESSION['user_data']['id'], $post['title'], $post['message'], $sanitized_url);
      if ($lastInsertedId ) {
        header("Location: " . ROOT_URL . '/messages');
      }
    }
  }

  function isFullview() {
    return true;
  }
}