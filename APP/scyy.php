<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
$id=$_GET["id"];
include_once("../peizhi.php");

if($_SESSION['quanxian']!=2){
	$zt="select yonghu from app where id=$id;";
		$zhixing1=mysqli_query($lj,$zt);
		while($row=mysqli_fetch_array($zhixing1)){
			if($row['yonghu']==$_SESSION['id']){
				$scyy="delete from app where id=$id;";
					$scyy1=mysqli_query($lj,$scyy);
			}
		}
		
	
	
}else{


	$zt="delete from app where id=$id;";
		$zhixing1=mysqli_query($lj,$zt);
		
}



?>
<script> history.go(-1);</script>