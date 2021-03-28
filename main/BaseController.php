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

  protected function getView($view_model, $is_fullview) {
    $view = 'view/' . get_class($this) . '/' . $this->action . '.php';
    if($is_fullview) {
      require 'view/Home.php';
    } else {
      require ($view);
    }
  }
}