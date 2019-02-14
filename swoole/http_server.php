<?php
/**
 * Created by PhpStorm.
 * User: luoxiaoquan
 * Date: 2019-02-14
 * Time: 20:13
 */
$serv=new swoole_http_server('0.0.0.0',9501);
/*// 获取请求
$request:请求信息 get post
$respose: 返回信息

*/
$serv->on("request",function ($request,$respose){
var_dump($request);
$respose->header("Content-Type","text/html,charset=utf-8;");
$respose->end("hello word");
});
$serv->start();