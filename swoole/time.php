<?php
/**
 * Created by PhpStorm.
 * User: luoxiaoquan
 * Date: 2019-02-14
 * Time: 20:38
 */
//定时器 循环执行
swoole_timer_tick(2000,function($timer_id){
   echo "执行 $timer_id";
});

//单次执行 多少秒后执行
swoole_timer_after(10,function(){
   echo "3000 后执行 \n";
});
