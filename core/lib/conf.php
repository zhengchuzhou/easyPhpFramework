<?php
/**
 * 配置类
 */
namespace core\lib;

class conf
{
    static public $conf = [];
    static public function getConf($name, $file)
    {
        /**
         * 1、判断文件是否存在
         * 2、判断配置是否存在
         * 3、缓存配置
         */
        $conf = self::getAll($file);
        if (isset($conf[$name]))
            return $conf[$name];
        else
            throw new \Exception('没有这个配置项'.$name);
    }

    static public function getAll($file)
    {
        /**
         * 1、判断文件是否存在
         * 2、缓存配置
         */
        if (!isset(self::$conf[$file])) {
            $path = ROOT.'/core/config/'.$file.'.php';
            if (!is_file($path)) {
                throw new \Exception('找不到配置文件：'.$file);
                die();
            } else {
                self::$conf[$file] = include $path;
            }
        }
        return self::$conf[$file];
    }
}