<?php
namespace core\lib\log;

use core\lib\conf;

class file
{
    public $path;
    public function __construct()
    {
        $this->path = conf::getConf('OPTION', 'log')['PATH'].date('Ymd').'/';
    }

    public function log($message, $file = 'log')
    {
        /**
         * 1、确定日志存储目录是否存在
         *  不存在，新建目录
         * 2、写入日志
         */
        if (!is_dir($this->path))
            mkdir($this->path, '0777', 'true');
        $message = date('Y-m-d H:i:s') . ' ' . json_encode($message) . PHP_EOL;
        file_put_contents($this->path.$file.'.php', $message, FILE_APPEND);
    }
}