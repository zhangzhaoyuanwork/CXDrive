<?php   
header("Content-Type: text/html;charset=utf-8");
$wjid=$_GET["wjid"];
$qunid=$_GET["qunid"];
include_once("../peizhi.php");
		$zt1= "update wenjian set qun1=null where id='$wjid' and qun1='$qunid'";
		$zt2= "update wenjian set qun2=null where id='$wjid' and qun2='$qunid'";
		$zt3= "update wenjian set qun3=null where id='$wjid' and qun3='$qunid'";
		$zt4= "update wenjian set qun4=null where id='$wjid' and qun4='$qunid'";
		$zhixing1=mysqli_query($lj,$zt1);
		$zhixing2=mysqli_query($lj,$zt2);
		$zhixing3=mysqli_query($lj,$zt3);
		$zhixing4=mysqli_query($lj,$zt4);
		
		?>
		<script> history.go(-1);</script>
		


