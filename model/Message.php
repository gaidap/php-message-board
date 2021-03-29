<?php
class MessageModel extends BaseModel {

  function index() {
    if($_POST['deleteMessage']) {
      $this->repository->deleteMessage($_POST['messageId'], $_POST['userId']);
    }
    return $this->repository->fetchAllMessages();
  }

  function add() {
    // Sanitize user input
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if($post['submitMessage']) {
      $this->repository->insertMessage(1, $post['title'], $post['message'], $post['link']);
    }
  }

  function isFullview() {
    return true;
  }
}