<?php
/**
 * 核心文件
 */
namespace core;

use core\lib\log;

class core
{
    public $assign = [];
    static public function run()
    {
        log::init();
        $route = new \core\lib\route();

        $controller = $route->controller;
        $action = $route->action;
        $file = APP.'/controller/'.$controller.'Controller.php';
        $class = '\\'.MODULE.'\\controller\\'.$controller.'Controller';
        if (is_file($file)) {
            include_once $file;
            $class = new $class();
            $class->$action();
        } else
            throw new \Exception('找不到控制器：'.$controller);
    }

    static public function load($class)
    {
        //  自动加载类库
        $class = str_replace('\\', '/', $class);
        $file = ROOT.'/'.$class.'.php';
        if (is_file($file))
            include_once $file;
        else
            return false;
    }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $file = APP.'/view/'.$file.'.php';
        if (is_file($file)) {
            extract($this->assign);
            include $file;
        } else
            throw new \Exception('找不到该视图文件');
    }
}