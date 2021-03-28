<?php
class Bootstrap {
  private $controller;
  private $action;
  private $request;

  function __construct ($request) {
    $this->request = $request;
    if ($this->request['controller'] === "") {
      $this->controller = 'home';
    } else {
      $this->controller = $this->request['controller'];
    }
    if ($this->request['action'] === "") {
      $this->action = 'index';
    } else {
      $this->action = $this->request['action'];
    }
  }

  private function isActionController() {
    return in_array('Controller', $parents) && method_exists($this->controller, $this->action);
  }

  function createController() {
    if(!class_exists($this->controller)) {
      echo '<h1>Controller does not exist.</h1>';
      return null;
    }
    $parents = class_parents($this->controller);
    if($this->isActionController()) {
      return new $this->controller($this->action, $this->request);
    } else {
      echo '<h1>Controller or action does not exist.</h1>';
      return null;
    }
  }
}