<?php
/**
 * 日志类
 */
namespace core\lib;
use \core\lib\conf;

class log
{
    static public $class;
    /**
     * 1、确定日志存储方式
     * 2、写日志
     */
    static public function init()
    {
        //  确定存储方式
        $drive = conf::getConf('DRIVE', 'log');
        $class = '\core\lib\log\\'.$drive;
        self::$class = new $class;
    }

    static public function log($message, $file = 'log')
    {
        self::$class->log($message, $file);
    }
}