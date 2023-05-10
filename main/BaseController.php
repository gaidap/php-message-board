<?php
declare(strict_types=1);

abstract class BaseController {
  protected array $request;
  protected string $action;

  public function __construct(array $request, string $action) {
    $this->request = $request;
    $this->action = $action;
  }

  public function executeAction() {
    return $this->{$this->action}();
  }

  private function getViewNameFromControllerClass(): array|string|null
  {
    return str_replace("controller", '', strtolower(get_class($this)));
  }

  protected function loadView(mixed $ACTION_RESPONSE, bool $withMainView): void
  {
    $view = 'view/' . $this->getViewNameFromControllerClass() . '/' . $this->action . '.php';
    if($withMainView) {
      require 'view/main.php';
    } else {
      require ($view);
    }
  }
}
