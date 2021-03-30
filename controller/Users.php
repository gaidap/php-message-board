<?php
class UsersController extends BaseController {
  protected function register() {
    $view_model = new UserModel(new UserRepository());
    $this->getView($view_model->register(), $view_model->withMainview());
  }

  protected function login() {
    $view_model = new UserModel(new UserRepository());
    $this->getView($view_model->login(), $view_model->withMainview());
  }

  protected function logout() {
    unset($_SESSION['is_logged_in']);
    unset($_SESSION['user_data']);
    session_destroy();
    header("Location: " . ROOT_URL);
  }
}