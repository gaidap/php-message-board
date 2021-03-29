<?php
class MessageModel extends BaseModel {

  function index () {
    return $this->repository->fetchAllMessages();
  }

  function isFullview() {
    return true;
  }
}