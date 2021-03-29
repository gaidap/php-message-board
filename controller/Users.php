<?php
class UsersController extends BaseController {
  protected function register() {
    $view_model = new UserModel(new UserRepository());
    $this->getView($view_model->register(), $view_model->isFullview());
  }

  protected function login() {
    $view_model = new UserModel(new UserRepository());
    $this->getView($view_model->login(), $view_model->isFullview());
  }
}