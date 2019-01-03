<?php
require_once 'core/BaseController.php';
require_once 'core/FrontController.php';

$frontController = new FrontController();

$controllerObj = $frontController->loadController();
$frontController->launchAction($controllerObj);

?>
