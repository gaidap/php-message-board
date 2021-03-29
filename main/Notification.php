<?php
class Notification {
  static function notify($text, $type) {
    switch ($type) {
      case 'error':
        echo '<div class="notification alert alert-danger">' . $text . '</div>';
        break;
      default:
        echo '<div class="notification alert alert-success">' . $text . '</div>';
        break;
    }
  }
}