<?php   
session_start();
$zzqx=$_SESSION['quanxian'];
header("Content-Type: text/html;charset=utf-8");
if	($zzqx==2)
{
$zh=$_POST['zh'];
include("../butian.php");
header("Location:yhwjgl2.php"); 
} 
else{echo("您似乎没有权限");}
?>


