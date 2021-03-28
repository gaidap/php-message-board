<?php
final class Bootstrap {
  private $controller;
  private $action;
  private $request;

  private function initController() {
    if ($this->request['controller'] === "") {
      $this->controller = 'home';
    } else {
      $this->controller = $this->request['controller'];
    }
  }

  private function initAction() {
    if ($this->request['action'] === "") {
      $this->action = 'index';
    } else {
      $this->action = $this->request['action'];
    }
  }

  function __construct ($request) {
    $this->request = $request;
    $this->initController();
    $this->initAction();
  }

  private function isActionController() {
    $parents = class_parents($this->controller);
    return in_array('BaseController', $parents) && method_exists($this->controller, $this->action);
  }

  function createController() {
    if(!class_exists($this->controller)) {
      echo '<h1>Controller does not exist.</h1>';
      return null;
    }
    if($this->isActionController($parents)) {
      return new $this->controller($this->request, $this->action);
    } else {
      echo '<h1>Controller or action does not exist.</h1>';
      return null;
    }
  }
}