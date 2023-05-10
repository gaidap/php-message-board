<?php
session_start();

require 'config.php';

require 'persistence/RdbmsConnection.php';
require 'persistence/BaseRepository.php';
require 'persistence/MessageRepository.php';
require 'persistence/UserRepository.php';

require 'main/Bootstrap.php';
require 'main/BaseController.php';
require 'main/BaseModel.php';
require 'main/Notification.php';

require 'controller/HomeController.php';
require 'controller/MessagesController.php';
require 'controller/UsersController.php';

require 'model/HomeModel.php';
require 'model/MessageModel.php';
require 'model/UserModel.php';

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller) {
  $controller->executeAction();
}
