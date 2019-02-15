<?php
/**
 * Created by PhpStorm.
 * User: luoxiaoquan
 * Date: 2019-02-14
 * Time: 20:10
 */
//创建Server对象，监听 127.0.0.1:9501端口
$serv = new swoole_server("127.0.0.1", 9501);

//监听连接进入事件
$serv->on('connect', function ($serv, $fd) {
    echo "Client: 建立连接Connect.\n";
});

//监听数据接收事件
/*$serv:服务器信息
$fd:客户端信息
$from_id:客户端id
$data: 客户端发送的数据
 * */
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
    $serv->send($fd, "Server inster table ".$data.'from_id_'.$from_id);
    swoole_timer_after(1000,function(){
        $msg= "5 订单失效 后执行111 \n";
        echo $msg."server;";
    });
    $data=json_decode($data,true);
   //print_r($data);
    if(!empty($data)&&$data['order_type']=='orderinstall'){
        //单次执行 多少秒后执行
        $ss="test function";
        swoole_timer_after(5,function(){
          //  print_r("gloab+".$GLOBALS['ss']);
           $file= file_get_contents('./tcp_clien.php');
           print_r('file'.$file);
            $msg= "5 订单失效 后执行 \n";
            echo $msg."server;end";
            //$serv->send($fd, "Server inster msg ".$msg.'from_id_'.$from_id);
        });

    }



});

//监听连接关闭事件
$serv->on('close', function ($serv, $fd) {//$fd 客户端信息
    echo "Client: 连接关闭 Close.\n";
});

//启动服务器
$serv->start();
