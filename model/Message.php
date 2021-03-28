<?php
class MessageModel extends BaseModel {

  function index () {
    return MessageRepository::fetchAllMessages($this->rdbms_connection);
  }

  function isFullview() {
    return true;
  }
}