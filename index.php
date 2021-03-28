<?php
require 'config.php';
require 'main/Bootstrap.php';

require 'main/BaseController.php';
require 'main/BaseModel.php';

require 'controller/Home.php';
require 'controller/Messages.php';
require 'controller/Users.php';

require 'model/Home.php';
require 'model/Message.php';
require 'model/User.php';

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller) {
  $controller->executeAction();
}