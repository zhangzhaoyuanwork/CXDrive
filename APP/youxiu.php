<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
$id=$_GET["id"];
if($_SESSION['quanxian']!=2){die;}else{
include_once("../peizhi.php");

	$zt="select youxiu from app where id=$id;";
		$zhixing1=mysqli_query($lj,$zt);
		while($row=mysqli_fetch_array($zhixing1)){
			if($row['youxiu']==0){
				$zhzc= "update app set youxiu=1 where id=$id;";
				$zhixing2 = mysqli_query($lj,$zhzc);
			}else{
				$zhzc1= "update app set youxiu=0 where id=$id;";
				$zhixing3 = mysqli_query($lj,$zhzc1);
			}
		}
		
		



}



?>
<script> history.go(-1);</script>