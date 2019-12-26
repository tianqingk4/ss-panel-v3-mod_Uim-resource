<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/23 0023
 * Time: 下午 12:15
 */

$config = require_once 'config.php';
function db(){
    global $config;
    static $_db;
    if(!isset($_db)){
        $dbConf = $config['db'];
        $_db = new mysqli($dbConf['db_host'],$dbConf['db_user'],$dbConf['db_pwd'],$dbConf['db_name']);
        if ($_db->connect_error){
            die("数据库连接失败".$_db->connect_error);
        }
    }
    return $_db;
}