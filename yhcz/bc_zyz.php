<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
$wjid=$_GET["wjid"];
$yhid=$_SESSION["id"];
$yhqx=$_SESSION["quanxian"];


include_once("../peizhi.php");  
include_once("../butian.php");  

if($yhqx!=0){
	$fzwj="insert into wenjian(wenjiandizhi,wenjianming,wenjianleixing,wenjianfenlei,wenjiandaxiao,yonghu,md5,md51,md52,md53)select wenjiandizhi,wenjianming,wenjianleixing,wenjianfenlei,wenjiandaxiao,'$yhid',md5,md51,md52,md53 from wenjian where id='$wjid';";
$xzm1tj="update wenjian set xiazaima1=concat(id,'$ysy') where xiazaima1 is null;";
$fzwj1=mysqli_query($lj,$fzwj);
$xzm1tj1=mysqli_query($lj,$xzm1tj);
}else{


if($yhid!=""&&$wjid!=""){
	

$ysy=wjysy('');
$fzwj="insert into wenjian(wenjiandizhi,wenjianming,wenjianleixing,wenjianfenlei,wenjiandaxiao,yonghu,md5,md51,md52,md53)select wenjiandizhi,wenjianming,wenjianleixing,wenjianfenlei,wenjiandaxiao,'$yhid',md5,md51,md52,md53 from wenjian where id='$wjid' and gongxiang=1;";
$xzm1tj="update wenjian set xiazaima1=concat(id,'$ysy') where xiazaima1 is null;";
$fzwj1=mysqli_query($lj,$fzwj);
$xzm1tj1=mysqli_query($lj,$xzm1tj);



}else{
	echo "<script>alert('您还未登录！');</script>";
}
}
?>

<script> history.go(-1);</script>