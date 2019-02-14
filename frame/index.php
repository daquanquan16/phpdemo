<?php
/**
 * Created by PhpStorm.
 * User: zhouwei
 * Date: 2019/2/14
 * Time: 13:32
 */
require_once './core/app.php';

/*$request_uri=$_SERVER['REQUEST_URI'];
$script_name=$_SERVER['SCRIPT_NAME'];
$request=str_replace($script_name.'?s=/','',$request_uri);
$request_arrary=explode('?',$request);
$controller_action=explode('/',$request_arrary[0]);
$controller=$controller_action[0];
$action=$controller_action[1];
require_once './application/controller/'.$controller.'.php';
$class=new $controller;
$class->$action();

$class= new ReflectionClass($controller);//建立￥controller反射类
$instance=$class->newInstanceArgs();// 实例化反射类
$method=$class->getMethod($action);//获取$action 方法
$method->invoke($instance);//执行方法*/