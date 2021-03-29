<?php
class MessageModel extends BaseModel {

  function index() {
    if($_POST['deleteMessage']) {
      $this->repository->deleteMessage($_POST['messageId'], $_POST['userId']);
    }
    return $this->repository->fetchAllMessages();
  }

  function add() {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if($post['submitMessage']) {
      $sanitized_url = filter_var($post['link'], FILTER_SANITIZE_URL);
      $this->repository->insertMessage(1, $post['title'], $post['message'], $sanitized_url);
    }
  }

  function isFullview() {
    return true;
  }
}