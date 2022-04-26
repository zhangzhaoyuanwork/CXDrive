<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
$wjid=$_GET["wjid"];
$yhid=$_SESSION["id"];


include_once("../peizhi.php");
include_once("../butian.php");


$sjwzhd=$wz."/yhcz/xs_jsj.php";
$sjwzhd2=$wz."/yhcz/xs_jxsc.php";
$sjwzhd3=$wz."/yhcz/xs_wdjx.php";

if(BTsjwzhd($sjwzhd)||BTsjwzhd($sjwzhd2)||BTsjwzhd($sjwzhd3)){
	

	
					$zhzc= "delete from baocunjingxiang where yonghu=$yhid and id=$wjid;";
					$zhixing2 = mysqli_query($lj,$zhzc);
	
			

			
	
	
}else{die();}


?>
<script> history.go(-1);</script>