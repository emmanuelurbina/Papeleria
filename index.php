<?php

/** Lectura de archivos .env */
require_once "core/dotenv.php";
(new DotEnv('.env'))->load();
/** Zona Horaria */
date_default_timezone_set('US/Central');

if (!isset($_REQUEST['controller']) || !isset($_REQUEST['action'])) {
  require_once 'controller/base_controller.php';
  $controller = new BaseController();
  $controller->index();
} else {
  $controller = $_REQUEST['controller'];
  $action = $_REQUEST['action'];
  $document = 'controller/' . $controller . '_controller.php';

  if (file_exists($document)) {
    require_once $document;
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    call_user_func(array($controller, $action));

  } else {
    $document = 'view/404.php';
    require_once 'view/404.php';
  }
}
