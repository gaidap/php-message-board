<?php
declare(strict_types=1);

final class MessageModel extends BaseModel
{

    public function index(): array|bool
    {
        if ($_POST['deleteMessage']) {
            $this->repository->deleteMessage($_POST['messageId'], $_SESSION['user_data']['id']);
        }

        return $this->repository->fetchAllMessages();
    }

    public function add(): string
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (!$post['submitMessage']) {
            return '';
        }

        $sanitized_url = empty($post['link']) ? '' : filter_var($post['link'], FILTER_VALIDATE_URL);
        $lastInsertedId = null;
        if (!empty($post['link']) && !$sanitized_url) {
            Notification::notify('Link must be a valid url and has to start with http or https.', 'error');
        } elseif (empty($post['title'])) {
            Notification::notify('Title must not be empty.', 'error');
        } elseif (!$_SESSION['user_data']['id']) {
            Notification::notify('User not logged in.', 'error');
        } else {
            $lastInsertedId = $this->repository->insertMessage($_SESSION['user_data']['id'], $post['title'], $post['message'], $sanitized_url);
        }

        if ($lastInsertedId) {
            header("Location: " . ROOT_URL . '/messages');
        }

        return '';
    }

    public function withMainView(): bool
    {
        return true;
    }
}
