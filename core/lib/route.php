<?php
/**
 * 路由文件
 */
namespace core\lib;
use \core\lib\conf;

class route
{
    public $controller;
    public $action;
    public function __construct()
    {
        $uri = $_SERVER['REQUEST_URI'];
        if (isset($uri) && $uri != '/') {
            $uriArr = explode('/', trim($uri, '/'));
            if (isset($uriArr[0])) {
                $this->controller = $uriArr[0];
                unset($uriArr[0]);
            }
            if (isset($uriArr[1])) {
                $this->action = $uriArr[1];
                unset($uriArr[1]);
            }
            else
                $this->action = conf::getConf('ACTION', 'route');
            //  uri多余部分转化成GET
            for ($i = 2; $i < count($uriArr) + 2; $i += 2)
                isset($uriArr[$i + 1]) ? $_GET[$uriArr[$i]] = $uriArr[$i + 1] : '';
        } else {
            $this->controller = conf::getConf('CONTROLLER', 'route');
            $this->action = conf::getConf('ACTION', 'route');
        }
        log::log('controller:'.$this->controller.', action:'.$this->action.', get:'. json_encode($_GET));
    }
}