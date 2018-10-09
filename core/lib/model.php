<?php
/**
 * model类
 */
namespace core\lib;
use \core\lib\conf;

class model extends \PDO
{
    public function __construct()
    {
        try {
            $conf = conf::getAll('db');
            parent::__construct($conf['DSN'], $conf['USERNAME'], $conf['PASSWD']);
        } catch (\PDOException $e) {
            p($e->getMessage());
        }
    }
}