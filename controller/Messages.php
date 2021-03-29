<?php
class MessagesController extends BaseController {
  protected function index() {
    $view_model = new MessageModel(new MessageRepository());
    $this->getView($view_model->index(), $view_model->isFullview());
  }
}