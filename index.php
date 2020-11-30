<?php
session_start();
define("ROOT", dirname(__FILE__));

require_once(ROOT.'/vendor/autoload.php'); // Composer


$router = new \App\Router;
$router->run();