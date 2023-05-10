<?php
declare(strict_types=1);

final class Bootstrap
{
    private string $controller;
    private string $action;
    private array $request;

    private function initController(): void
    {
        if ($this->request['controller'] === "") {
            $this->controller = 'home' . 'controller';
        } else {
            $this->controller = $this->request['controller'] . 'controller';
        }
    }

    private function initAction(): void
    {
        if ($this->request['action'] === "") {
            $this->action = 'index';
        } else {
            $this->action = $this->request['action'];
        }
    }

    public function __construct($request)
    {
        $this->request = $request;
        $this->initController();
        $this->initAction();
    }

    private function isActionController(): bool
    {
        $parents = class_parents($this->controller);

        return in_array('BaseController', $parents, true) && method_exists($this->controller, $this->action);
    }

    public function createController()
    {
        if (!class_exists($this->controller)) {
            echo '<h1>Controller does not exist.</h1>';

            return null;
        }

        if ($this->isActionController()) {
            return new $this->controller($this->request, $this->action);
        }

        echo '<h1>Controller or action does not exist.</h1>';

        return null;
    }
}
