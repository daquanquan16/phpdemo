<?php
/**
 * Created by PhpStorm.
 * User: zhouwei
 * Date: 2019/2/14
 * Time: 14:06
 */

class framework
{
    public static function init()
    {
        $request_uri = $_SERVER['REQUEST_URI'];
        $script_name = $_SERVER['SCRIPT_NAME'];
        $request = str_replace($script_name . '?s=/', '', $request_uri);
        $request_arrary = explode('?', $request);
        $controller_action = explode('/', $request_arrary[0]);
        if (count($controller_action) >= 2) {
            $controller = $controller_action[0];
            $action = $controller_action[1];
        } else {
            require_once '/config/config.php';
            $controller = $config['default_controller'];
            $action = $config['default_action'];
        }

        return ['controller' => $controller, 'action' => $action];
    }

}