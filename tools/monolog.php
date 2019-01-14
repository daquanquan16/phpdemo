<?php
include_once '../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
//create log
$log=new Logger("name");
$log->pushHandler(new StreamHandler('../data/monolog.log', Logger::WARNING));
$log->warning("test");
$log->error("test2");