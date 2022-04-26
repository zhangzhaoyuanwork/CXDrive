<?php   
header("Content-Type: text/html;charset=utf-8");
session_start();
$yhid=$_SESSION["id"];
$yhqx=$_SESSION["quanxian"];
$wjjid=$_GET["wjid"];
include_once("../peizhi.php");
include_once("../butian.php");
function bianli($lj,$wjjid){



$wjcx="select id from wenjian where dangqianmulu='$wjjid'";
$wjcx1=mysqli_query($lj,$wjcx);
while($row=mysqli_fetch_array($wjcx1)){
	$wjid=$row['id'];
	$wjmc="select wenjiandizhi,yonghu,gongxiang,md5 from wenjian where id='$wjid';";
$wjmc1=mysqli_query($lj,$wjmc);
$wjmc2=mysqli_fetch_array($wjmc1);
$wjdz=$wjmc2[0];
$wjscyh=$wjmc2[1];
$wjgxzt=$wjmc2[2];
$wjmd5=$wjmc2[3];
$wjcc="select wenjiandizhi from wenjian where md5='$wjmd5' limit 1,1;";
$wjcc1=mysqli_query($lj,$wjcc);
$wjcc2=mysqli_fetch_array($wjcc1);
$wjccpd=$wjcc2[0];

		$dz="../wjcz/".$wjmc2[0];
		$yhwj="delete from wenjian where id=$wjid";
		$zhixing1=mysqli_query($lj,$yhwj);
		if($wjccpd=="")
		{
			unlink($dz);
		}


}


$wjsc="delete from mulu where id='$wjjid'";
$wjsc1=mysqli_query($lj,$wjsc);
$wjjcz="select id from mulu where dangqianmulu='$wjjid';";
$wjjcz1=mysqli_query($lj,$wjjcz);
while($row=mysqli_fetch_array($wjjcz1)){

	if($row['id']!=''){
		bianli($lj,$row['id']);

	}
}	
}

bianli($lj,$wjjid);

?>
