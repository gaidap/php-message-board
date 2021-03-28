<?php
require 'config.php';
require 'main/Bootstrap.php';

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();