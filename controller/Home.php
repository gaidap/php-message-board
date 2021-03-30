<?php
class HomeController extends BaseController {
  protected function index() {
    $view_model = new HomeModel();
    $this->getView($view_model->index(), $view_model->withMainview());
  }
}