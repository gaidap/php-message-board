<?php
abstract class BaseController {
  protected $request;
  protected $action;

  function __construct($request, $action) {
    $this->request = $request;
    $this->action = $action;
  }

  function executeAction() {
    return $this->{$this->action}();
  }

  private function getViewNameFromControllerClass() {
    return preg_replace('/controller/', '', strtolower(get_class($this)));
  }

  protected function getView($action_response, $with_mainview) {
    $view = 'view/' . $this->getViewNameFromControllerClass() . '/' . $this->action . '.php';
    if($with_mainview) {
      require 'view/main.php';
    } else {
      require ($view);
    }
  }
}