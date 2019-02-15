<?php
/**
 * Created by PhpStorm.
 * User: luoxiaoquan
 * Date: 2019-02-14
 * Time: 20:20
 */
$serv=new swoole_websocket_server('0.0.0.0','9501');
//on/start
//open/massage/close
//push()
// open 打开连接
// $serv  服务
// request: 客户端信息
$serv->on('open',function($serv,$requset){
 var_dump($requset);
 $serv->push($requset->fd,"welcome \n");
});
// message 接受信息
$serv->on('message',function ($serv,$request){
   echo "message:$request->data";
  $serv->push($request->fd,'get it message');
});

//close 关闭信息
$serv->on('close',function ($serv,$request){
echo 'close server \n';
});

$serv->start();
//ps -ajft