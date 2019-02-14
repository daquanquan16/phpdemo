<?php
/**
 * Created by PhpStorm.
 * User: tiny
 * Date: 2019/2/14
 * Time: 14:05
 */
require_once '/core/framework.php';
$controller_action = framework::init();
$controller = $controller_action['controller'];
$action = $controller_action['action'];
require_once './application/controller/' . $controller . '.php';
/*$class=new $controller;
$class->$action();*/
$class = new ReflectionClass($controller);//建立￥controller反射类
$instance = $class->newInstanceArgs();// 实例化反射类
$method = $class->getMethod($action);//获取$action 方法
$method->invoke($instance);//执行方法