<?php
/**
 * Created by PhpStorm.
 * User: luoxiaoquan
 * Date: 2019-02-14
 * Time: 20:55
 */
//创建异步tcp 客户端
$client = new swoole_client(SWOOLE_SOCK_TCP,SWOOLE_SOCK_ASYNC);
//注册链接成功的回调 $cli 服务
$client->on('connect',function ($cli){
    $cli->send('hello \n');
});

//注册数据接收  $cli 服务端信息 $data
$client->on('receive',function ($cli,$data){
    echo 'data:$data';
});

//注册链接失败
$client->on('error',function ($cli){
   echo '失败' ;
});

//注册链接关闭
$client->on('close',function ($cli){
    echo '关闭' ;
});

//发起链接
$client->connect('127.0.0.1',8080,10);