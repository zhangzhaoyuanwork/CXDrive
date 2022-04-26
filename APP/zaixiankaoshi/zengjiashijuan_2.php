<?php
session_start();
$sjm=$_POST["sjm"];
$yhid=$_SESSION["id"];
$sql="insert into shijuan(name,yonghuid) values('$sjm','$yhid')";
include_once("../../peizhi.php");
$zhixing2 = mysqli_query($lj,$sql);
?>
<script>alert("创建试卷成功");history.go(-2);</script>