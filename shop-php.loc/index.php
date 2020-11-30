<?php
session_start();

define("ROOT", dirname(__FILE__));

include_once(ROOT.'/components/Router.php');
include_once(ROOT."/config/db.php");

$db = Db::Connect();

$router = new Router;
$router->run();



?>