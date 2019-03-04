<?php
/**
 * Created by PhpStorm.
 * User: luoxiaoquan
 * Date: 2019-03-04
 * Time: 21:13
 */

class TcpServer
{
    public function __construct()
    {
        //创建Server对象，监听 127.0.0.1:9501端口
        $serv = new swoole_server("127.0.0.1", 9501);
        $serv->set(array(
          //  'reactor_num' => 2, //reactor thread num
            'worker_num' => 4,    //worker process num
          //  'backlog' => 128,   //listen backlog
          //  'max_request' => 50,
          //  'dispatch_mode' => 1,
            'task_worker_num'=>1
        ));
        //监听连接进入事件
        $serv->on('connect', [$this, 'connect']);
        //监听数据接收事件
        $serv->on('receive', [$this, 'receive']);
        $serv->on('task', [$this, 'task']);
        $serv->on('finish', [$this, 'finish']);
        //监听连接关闭事件
        $serv->on('close', [$this, 'close']);
        //启动服务器
        $serv->start();
    }

    public function connect($serv, $fd)
    {
        echo "Client: 建立连接Connect.\n";
    }
    //监听数据接收事件
    /*$serv:服务器信息
    $fd:客户端信息
    $from_id:客户端id
    $data: 客户端发送的数据
     * */
    public function receive($serv, $fd, $from_id, $data)
    {
        print_r($data);
        //
        $testData = ['task' => 1];
        $serv->task($testData);
        $serv->send($fd, "Server inster table " . $data . 'from_id_' . $from_id);
    }

    public function close($serv, $fd)
    {
        echo "Client: 连接关闭 Close.\n";
    }

    public function task($serv, $taskId, $workerId, $data)
    {
        print_r($data);
        return "onfinish is method";
    }

    public function finish($serv, $taskId, $data)
    {
        echo "taskid:{$taskId}\n";
        echo "finishdata:{$data}\n";
    }

}

new TcpServer();