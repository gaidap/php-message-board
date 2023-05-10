<?php
declare(strict_types=1);

final class HomeController extends BaseController {
  protected function index(): void
  {
    $viewModel = new HomeModel();
    $this->loadView($viewModel->index(), $viewModel->withMainview());
  }
}
