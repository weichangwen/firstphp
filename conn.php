<?php
/**
 * Created by PhpStorm.
 * User: wcw
 * Date: 2017/10/18
 * Time: 10:59
 */
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'test_database';
$conn=@mysql_connect($host,$user,$password) or die('数据库链接失败');
@mysql_select_db($database) or die('找不到数据库!');
mysql_query("set names 'utf8'");
?>