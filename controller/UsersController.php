<?php
declare(strict_types=1);

final class UsersController extends BaseController
{
    protected function register(): void
    {
        $viewModel = new UserModel(new UserRepository());
        $this->loadView($viewModel->register(), $viewModel->withMainview());
    }

    protected function login(): void
    {
        $viewModel = new UserModel(new UserRepository());
        $this->loadView($viewModel->login(), $viewModel->withMainview());
    }

    protected function logout(): void
    {
        unset($_SESSION['is_logged_in'], $_SESSION['user_data']);
        session_destroy();
        header("Location: " . ROOT_URL);
    }
}
