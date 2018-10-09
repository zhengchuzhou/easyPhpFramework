<?php
/**
 * 入口文件
 * 1、定义常量
 * 2、加载函数库
 * 3、启动框架
 */
define('ROOT', realpath('./'));
define('CORE', ROOT.'/core');
define('APP', ROOT.'/app');
define('MODULE', 'app');

include "vendor/autoload.php"; // 引入composer加载的类

define('DEBUG', true);
if (DEBUG) {
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set('display_errors', 'On');
} else
    ini_set('display_errors', 'Off');

include_once CORE.'/common/function.php';
include_once CORE.'/core.php';

spl_autoload_register('\core\core::load');

\core\core::run();

