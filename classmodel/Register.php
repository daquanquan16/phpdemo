<?php
//注册类型：对象树
//1、注册set() 把对象挂上树
//2、获取get() 
//3、注销 _unset()

class Register{
    protected static $obj=[];
    public static function set($alias,$obj){
        self::$obj[$alias]=$obj;
    }
    public static function get($alias){
        return self::$obj[$alias];
    }
    public static function _unset($alias){
        unset(self::$obj[$alias]);
    }
}

Register::set('factory', Factory::createObject('A'));
$obj=Register::get('factory');
$obj->createOrder();
Register::_unset('factory');