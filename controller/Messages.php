<?php
class MessagesController extends BaseController {
  
  protected function index() {
    if(isset($_SESSION['is_logged_in'])) {
      $view_model = new MessageModel(new MessageRepository());
      $this->getView($view_model->index(), $view_model->isFullview());
    } else {
      header("Location: " . ROOT_URL . '/users/login');
    }
  }

  protected function add() {
    if(isset($_SESSION['is_logged_in'])) {
      $view_model = new MessageModel(new MessageRepository());
      $this->getView($view_model->add(), $view_model->isFullview());
    } else {
      header("Location: " . ROOT_URL . '/users/login');
    }
  }
}