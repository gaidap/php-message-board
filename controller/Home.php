<?php
class Home extends BaseController {
  protected function index() {
    $view_model = new HomeModel();
    $this->getView($view_model->index(), $view_model->isFullview());
  }
}