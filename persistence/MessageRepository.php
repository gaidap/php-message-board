<?php
final class MessageRepository {
  final static function fetchAllMessages($db_connection) {
    $db_connection->prepareQuery('SELECT * FROM messages');
    $rows = $db_connection->resultSet();
    print_r($rows);
  }
}