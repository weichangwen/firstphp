<?php
/**
 * Created by PhpStorm.
 * User: wcw
 * Date: 2017/10/18
 * Time: 14:51
 */
session_start();
$_SESSION['username']="";
echo "<script language='JavaScript'>alert('成功退出登录');location='login.php';</script>";

?>