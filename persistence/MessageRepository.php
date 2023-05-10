<?php
declare(strict_types=1);

final class MessageRepository extends BaseRepository
{
    public function fetchAllMessages(): bool|array
    {
        $this->rdbms_connection->prepareQuery('SELECT * FROM messages ORDER BY creation_date DESC');

        return $this->rdbms_connection->resultSet();
    }

    public function insertMessage($user_id, $title, $message, $link): bool|string
    {
        $this->rdbms_connection->prepareQuery('INSERT INTO messages (user_id, title, message, link) VALUES(:userId, :title, :message, :link)');
        $this->rdbms_connection->bindQueryParam(':userId', $user_id);
        $this->rdbms_connection->bindQueryParam(':title', $title);
        $this->rdbms_connection->bindQueryParam(':message', $message);
        $this->rdbms_connection->bindQueryParam(':link', $link);
        $this->rdbms_connection->excecuteQuery();

        return $this->rdbms_connection->fetchLastInsertId();
    }

    public function deleteMessage($messageId, $userId): void
    {
        $this->rdbms_connection->prepareQuery('DELETE FROM messages WHERE id = :messageId AND user_id = :userId');
        $this->rdbms_connection->bindQueryParam(':messageId', $messageId);
        $this->rdbms_connection->bindQueryParam(':userId', $userId);
        $this->rdbms_connection->excecuteQuery();
    }
}
