<?php   
header("Content-Type: text/html;charset=utf-8");
session_start();
$zh = $_POST["zh"];  
$mm = $_POST["mm"];  
include("../../butian.php");
if($zh == "" || $mm == "")  
{  
	echo "《请输入用户名或密码！》";  
}  
else 
{  
   include_once("../../peizhi.php");
   $zhcz="select id,quanxian from yonghu where zhanghao='$zh' and mima='$mm';";
   
	$zhixing1=mysqli_query($lj,$zhcz);
	while($row = mysqli_fetch_array($zhixing1)){
		$yhid=$row['id'];
		$yhqx=$row['quanxian'];
   }

}

$wjid=$_POST["wjid"];
if($yhqx==2){
$wjmc="select wenjiandizhi,md5,md51,md52,md53,wenjiandaxiao from wenjian where id='$wjid';";
$wjmc1=mysqli_query($lj,$wjmc);
$wjmc2=mysqli_fetch_array($wjmc1);
$wjdz=$wjmc2[0];
$wjmd5=$wjmc2[1];
$wjmd51=$wjmc2[2];
$wjmd52=$wjmc2[3];
$wjmd53=$wjmc2[4];
$wjdx=$wjmc2[5];
$wjcc="select wenjiandizhi from wenjian where md5='$wjmd5' and md51='$wjmd51' and md52='$wjmd52' and md53='$wjmd53' and wenjiandaxiao='$wjdx' limit 1,1;";
$wjcc1=mysqli_query($lj,$wjcc);
$wjcc2=mysqli_fetch_array($wjcc1);
$wjccpd=$wjcc2[0];
$dz="../../wjcz/".$wjmc2[0];

		$yhwj="delete from wenjian where id=$wjid;delete from baocunjingxiang where wenjianid=$wjid;delete from jingshijiefenxiang where wenjianid=$wjid;";
		$zhixing1=mysqli_multi_query($lj,$yhwj);
		if($wjccpd=="")
		{
			unlink($dz);
		}
}else if($yhqx==1){
$wjmc="select wenjiandizhi,yonghu,gongxiang,md5,md51,md52,md53,wenjiandaxiao from wenjian where id='$wjid';";
$wjmc1=mysqli_query($lj,$wjmc);
$wjmc2=mysqli_fetch_array($wjmc1);
$wjdz=$wjmc2[0];
$wjscyh=$wjmc2[1];
$wjgxzt=$wjmc2[2];
$wjmd5=$wjmc2[3];
$wjmd51=$wjmc2[4];
$wjmd52=$wjmc2[5];
$wjmd53=$wjmc2[6];
$wjdx=$wjmc2[7];
$wjcc="select wenjiandizhi from wenjian where md5='$wjmd5' and md51='$wjmd51' and md52='$wjmd52' and md53='$wjmd53' and wenjiandaxiao='$wjdx' limit 1,1;";
$wjcc1=mysqli_query($lj,$wjcc);
$wjcc2=mysqli_fetch_array($wjcc1);
$wjccpd=$wjcc2[0];

		if($yhid==$wjscyh||$wjgxzt==1){
		$dz="../../wjcz/".$wjmc2[0];
		
		
		$scwjfx="delete from baocunjingxiang where wenjianid=$wjid;";$scwjfx1=mysqli_query($lj,$scwjfx);
		$scwjbc="delete from jingshijiefenxiang where wenjianid=$wjid;";$scwjbc1=mysqli_query($lj,$scwjbc);
		$yhwj="delete from wenjian where id=$wjid;";
		
		$zhixing1=mysqli_query($lj,$yhwj);
		if($wjccpd=="")
		{
			unlink($dz);
		}
		}
}else if($yhqx==0){
$wjmc="select wenjiandizhi,yonghu,gongxiang,md5,md51,md52,md53,wenjiandaxiao from wenjian where id='$wjid';";
$wjmc1=mysqli_query($lj,$wjmc);
$wjmc2=mysqli_fetch_array($wjmc1);
$wjdz=$wjmc2[0];
$wjscyh=$wjmc2[1];
$wjgxzt=$wjmc2[2];
$wjmd5=$wjmc2[3];
$wjmd51=$wjmc2[4];
$wjmd52=$wjmc2[5];
$wjmd53=$wjmc2[6];
$wjmd53=$wjmc2[7];
$wjcc="select wenjiandizhi from wenjian where md5='$wjmd5' and md51='$wjmd51' and md52='$wjmd52' and md53='$wjmd53' and wenjiandaxiao='$wjdx' limit 1,1;";
$wjcc1=mysqli_query($lj,$wjcc);
$wjcc2=mysqli_fetch_array($wjcc1);
$wjccpd=$wjcc2[0];

		if($yhid==$wjscyh){
		$dz="../../wjcz/".$wjmc2[0];
		
		$scwjfx="delete from baocunjingxiang where wenjianid=$wjid;";$scwjfx1=mysqli_query($lj,$scwjfx);
		$scwjbc="delete from jingshijiefenxiang where wenjianid=$wjid;";$scwjbc1=mysqli_query($lj,$scwjbc);
		$yhwj="delete from wenjian where id=$wjid;";
		$zhixing1=mysqli_query($lj,$yhwj);
		if($wjccpd=="")
		{
			unlink($dz);
		}
		}
}


?>

<script> history.go(-1);</script>