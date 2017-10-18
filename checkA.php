<?php
session_start();
if($_SESSION['username']==""){
    echo "<script language='JavaScript'>alert('非法操作');location='login.php';</script>";
}
?>