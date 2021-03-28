<?php
final class MessageRepository {
  final static function fetchAllMessages($db_connection) {
    $db_connection->prepareQuery('SELECT * FROM messages');
    return $db_connection->resultSet();
  }
}