<?php
session_start();
require dirname(__DIR__).'/app/Core/JsonModel.php';
require dirname(__DIR__).'/app/Core/ModuleController.php';
foreach (glob(dirname(__DIR__).'/app/Models/*Model.php') as $file) require $file;
foreach (glob(dirname(__DIR__).'/app/Controllers/*Controller.php') as $file) require $file;
require dirname(__DIR__).'/app/Core/App.php';
$app=new App\Core\App(); $app->run();
