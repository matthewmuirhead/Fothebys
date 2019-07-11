<?php
session_start();
require '../autoloader.php';
$routes = new \Cars\Routes();
$entryPoint = new \CSY2028\EntryPoint($routes);
$entryPoint->run();
