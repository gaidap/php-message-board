<?php
class MessageRepository extends BaseRepository {
  function fetchAllMessages() {
    $this->rdbms_connection->prepareQuery('SELECT * FROM messages ORDER BY creation_date DESC');
    return  $this->rdbms_connection->resultSet();
  }

  function insertMessage($user_id, $title, $message, $link) {
    $this->rdbms_connection->prepareQuery('INSERT INTO messages (user_id, title, message, link) VALUES(:userId, :title, :message, :link)');
    $this->rdbms_connection->bindQueryParam(':userId', $user_id);
    $this->rdbms_connection->bindQueryParam(':title', $title);
    $this->rdbms_connection->bindQueryParam(':message', $message);
    $this->rdbms_connection->bindQueryParam(':link', $link);
    $this->rdbms_connection->excecuteQuery();
    return $this->rdbms_connection->fetchLastInsertId();
  } 

  function deleteMessage($messageId, $userId) {
    $this->rdbms_connection->prepareQuery('DELETE FROM messages WHERE id = :messageId AND user_id = :userId');
    $this->rdbms_connection->bindQueryParam(':messageId', $messageId);
    $this->rdbms_connection->bindQueryParam(':userId', $userId);
    $this->rdbms_connection->excecuteQuery();
  }
}