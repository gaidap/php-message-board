<?php
declare(strict_types=1);

final class Notification {
  public static function notify($text, $type): void
  {
      echo match ($type) {
          'error' => '<div class="notification alert alert-danger">' . $text . '</div>',
          default => '<div class="notification alert alert-success">' . $text . '</div>',
      };
  }
}
