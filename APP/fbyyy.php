<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
include_once("../peizhi.php");
include_once("../butian.php");
        $yym = fansql2($_GET["yym"]);  
		$url = fansql2url($_GET["url"]); 

		$yhid=$_SESSION["id"];
		
		
		if($_SESSION["quanxian"]==2){
			
			$fb="insert into app(name,url,yonghu,shenhe) values ('$yym','$url','$yhid','1')";
			$fb3=mysqli_query($lj,$fb);
			echo "<script> alert('您的应用已发布成功!');history.go(-2);</script>";
			die;
		}
		
		if(pingAddress($url)){
		
		


		$fb="insert into app(name,url,yonghu) values ('$yym','$url','$yhid')";
		

		$fb3=mysqli_query($lj,$fb);

		
echo "<script> alert('发布成功！等待审核！');history.go(-2);</script>";
}else{
	echo "<script> alert('请检查地址是否连通');history.go(-1);</script>";
	
}
?>
