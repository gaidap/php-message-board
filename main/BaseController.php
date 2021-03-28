<?php
abstract class BaseController {
  protected $request;
  protected $action;

  function __construct($request, $action) {
    $this->request = $request;
    $this->action = $action;
  }

  function executeAction() {
    // echo $this->action;
    return $this->{$this->action}();
  }

  protected function getView($view_model, $is_fullview) {
    $view = 'view/' . get_class($this) . '/' . $this->action . '.php';
    if($is_fullview) {
      require 'view/main.php';
    } else {
      require ($view);
    }
  }
}