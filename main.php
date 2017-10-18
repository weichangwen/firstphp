<?php
/**
 * Created by PhpStorm.
 * User: wcw
 * Date: 2017/10/18
 * Time: 14:47
 */
require("conn.php");
function console_log($data)
{
    if (is_array($data) || is_object($data))
    {
        echo("<script>console.log('".json_encode($data)."');</script>");
    }
    else
    {
        echo("<script>console.log('".$data."');</script>");
    }
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>简单管理登陆系统-管理主页面</title>
    <script type="text/JavaScript">
        <!--
        function MM_jumpMenu(targ,selObj,restore){ //v3.0
            eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
            if (restore) selObj.selectedIndex=0;
        }
        //-->
    </script>
</head>
<body>
管理员，欢迎你！<a href='logout.php'>注销登录</a>
<?php
$sql="select * from title";
$rs=mysql_query($sql);
?>

<table width="540" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#C2C2C2">
    <tr>
        <td align="right" bgcolor="#FFFFFF"><a href="add.php">添加内容</a></td>
    </tr>
</table>
<table width="540" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#C2C2C2">
    <tr>
        <?php

        $i=0;
        while ($rows=mysql_fetch_assoc($rs))
        {
           /* echo("<script>console.log(".json_encode($rows['Id']).");</script>");
            echo("<script>console.log(".json_encode($rows["Title"]).");</script>");*/
            ?>
            <td align="center" bgcolor="#FFFFFF"><a href="?id=<?php echo $rows['Id']?>"><?php echo $rows["Title"]?></a></td>
            <?php
            $i++;
            if($i%9==0)
            {
                echo("</tr><tr>");
            }
        }
        ?>
    </tr>
</table>

<?php
$id=$_GET["id"];
echo("<script>console.log(".json_encode($id).");</script>");
if($id=="")
    $id=1;
$pagesize=10;
$sql="select id from contents where title=$id order by id desc";
$rs=mysql_query($sql);
$recordcount=mysql_num_rows($rs);
$pagecount=($recordcount-1)/$pagesize+1;
$pagecount=(int)$pagecount;
$pageno=$_GET["pageno"];
if($pageno=="")
    $pageno=1;
$startno=($pageno-1)*$pagesize;
$sql="select * from contents where title=$id  order by id desc limit $startno,$pagesize";
$rs=mysql_query($sql);
?>

</body>
</html>
