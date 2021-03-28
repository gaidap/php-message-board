<?php
require 'config.php';
require 'main/Bootstrap.php';
require 'main/BaseController.php';
require 'controller/Home.php';
require 'controller/Messages.php';
require 'controller/Users.php';

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller) {
  $controller->executeAction();
}