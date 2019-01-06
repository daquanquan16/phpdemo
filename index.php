<?php
include_once './mysql/Mysql.php';
$config=[
'host'=>'127.0.0.1',
'username'=>'root',
'password'=>'root',
'post'=>'3306',
'dbname'=>'test',
'chartset'=>'utf8',
];

$mysql=new Mysql($config);
include_once './classmodel/SingleModel.php';
$single=SingleModel::getInstace();
print_r($single);
$single->test();
include_once './classmodel/Factory.php';
$f=Factory::createObject("A");
print_r($f);
$f->createOrder();