<?php
class MessageRepository extends BaseRepository {
  function fetchAllMessages() {
    $this->rdbms_connection->prepareQuery('SELECT * FROM messages');
    return  $this->rdbms_connection->resultSet();
  }
}