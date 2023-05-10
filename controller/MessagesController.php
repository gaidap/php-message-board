<?php
declare(strict_types=1);

final class MessagesController extends BaseController {
  
  protected function index(): void
  {
    if(isset($_SESSION['is_logged_in'])) {
      $viewModel = new MessageModel(new MessageRepository());
      $this->loadView($viewModel->index(), $viewModel->withMainview());
    } else {
      header("Location: " . ROOT_URL . '/users/login');
    }
  }

  protected function add(): void
  {
    if(isset($_SESSION['is_logged_in'])) {
      $viewModel = new MessageModel(new MessageRepository());
      $this->loadView($viewModel->add(), $viewModel->withMainview());
    } else {
      header("Location: " . ROOT_URL . '/users/login');
    }
  }
}
