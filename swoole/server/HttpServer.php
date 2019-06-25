<?php
/**
 * Created by PhpStorm.
 * User: luoxiaoquan
 * Date: 2019-06-25
 * Time: 22:14
 */

class HttpServer
{
    public function __construct()
    {
        $server=new swoole_http_server('0.0.0.0',9501);
        $server->set(array(
            //  'reactor_num' => 2, //reactor thread num//reactor线程数
            'worker_num' => 4,    //worker process num worker进程数
            //  'backlog' => 128,   //listen backlogListen队列长度
            //  'max_request' => 50,//此参数表示worker进程在处理完n次请求后结束运行
            //  'dispatch_mode' => 1,
           // 'task_worker_num'=>1,
           // 'upload_tmp_dir' => '/data/uploadfiles/',  临时上传目录
            'document_root' => '/data/web/test/phpdemo/swoole/server', // v4.4.0以下版本, 此处必须为绝对路径
            'enable_static_handler' => true,
            'log_file' => './swoole.log',
        ));
        $server->on('request', [$this, 'request']);
        $server->start();
    }

    public function request($request,$respose){
        $respose->header("Content-Type","text/html,charset=utf-8;");
        $respose->end("hello word");
    }

}
new  HttpServer();