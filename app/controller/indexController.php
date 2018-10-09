<?php
namespace app\controller;

use core\lib\log;

class indexController extends \core\core
{
    public function index()
    {
        /*$model = new \core\lib\model();
        $sql = "select * from test";
        $query = $model->query($sql);
        $res = $query->fetchAll();*/

        $title = '视图文件';
        $data = 'hello world1';
        $this->assign('title', $title);
        $this->assign('data', $data);
        $this->display('index');
    }
}