<?php
/**
 * Created by PhpStorm.
 * User: wcw
 * Date: 2017/10/18
 * Time: 11:20
 */
session_start();
include_once 'conn.php';
$username = $_POST['username'];
//echo "$username";
$userpass = $_POST['userpass'];
//echo "$userpass";
$userpass = md5($userpass);
$sql = "select * from user";
$query = mysql_query($sql);

$row=mysql_fetch_array($query);

/*foreach($row as $key=>$value)
    echo $key."=>".$value."||";

return;*/


if($row['username']==$username){
    if($row['userpass']==$userpass){
        $_SESSION['username']=$username;
        echo "<script language='javascript'>alert('登录成功');location='main.php';</script>";
    }
    else{
        echo "<script language='javascript'>alert('密码错误！');location='login.php';</script>";
    }
}
else{
    echo "<script language='javascript' >alert('用户名不存在!');location='login.php';</script>";
}
?>