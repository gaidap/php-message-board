<?php
class MessageModel extends BaseModel {

  function index() {
    return $this->repository->fetchAllMessages();
  }

  function add() {
    
  }

  function isFullview() {
    return true;
  }
}