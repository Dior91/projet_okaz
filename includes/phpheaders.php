<?php
ini_set('display_errors', 'on');
session_start();
require_once dirname(__DIR__) . "/utils/utils.php";
require_once './vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
$user = getLoggedUser();
?>