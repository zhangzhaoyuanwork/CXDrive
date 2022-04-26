<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
$wjid=$_GET["wjid"];
$wjlx=$_GET["wjlx"];
$yhid=$_SESSION["id"];


include_once("../peizhi.php");
include_once("../butian.php");


$sjwzhd=$wz."/yhcz/xs_jsj.php";
$sjwzhd2=$wz."/yhcz/xs_jxsc.php";
$sjwzhd3=$wz."/yhcz/xs_wdjx.php";

if(BTsjwzhd($sjwzhd)||BTsjwzhd($sjwzhd2)||BTsjwzhd($sjwzhd3)){
	
	if($wjlx=="wj"){
	
					$zhzc= "insert into baocunjingxiang(wenjianid,yonghu) values ($wjid,$yhid);";
					$zhixing2 = mysqli_query($lj,$zhzc);
	
			
	}else if($wjlx=="wjj"){
		$zhzc= "insert into baocunjingxiang(muluid,yonghu) values ($wjid,$yhid);";
		$zhixing2 = mysqli_query($lj,$zhzc);
			
	}
	
	
}


?>
<script> history.go(-1);</script>