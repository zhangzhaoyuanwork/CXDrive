<?php
session_start();
$shenfen=$_POST["shenfen"];
$_SESSION["zaixiankaoshi"]=$shenfen;
$yhid=$_SESSION["id"];
include_once("../../peizhi.php");
$zhcz="update yonghu set zaixiankaoshi=$shenfen where id=$yhid";
mysqli_query($lj,$zhcz);
if($shenfen==1){header("Location:jiaoshi.php");}else if($shenfen==0){header("Location:xuesheng.php");}else{echo "<script>alert('发生错误');history.go(-1);</script>";}
?>