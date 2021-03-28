<?php
require 'config.php';
require 'main/Bootstrap.php';
require 'controller/Home.php';

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller) {
  $controller->executeAction();
}