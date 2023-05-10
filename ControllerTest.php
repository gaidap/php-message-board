<?php
declare(strict_types=1);

require 'main/Bootstrap.php';
require 'main/BaseController.php';
require 'main/BaseModel.php';
require 'main/Notification.php';

require 'controller/HomeController.php';
require 'model/HomeModel.php';

use PHPUnit\Framework\TestCase;

final class ControllerTest extends TestCase
{
    public function testIndexCreatesView(): void
    {
        define('ROOT_URL', 'http://php.local');
        $controller = new \HomeController([], 'index');
        $controller->executeAction();
        $this->expectNotToPerformAssertions();
    }
}
