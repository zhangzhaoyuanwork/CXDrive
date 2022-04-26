<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
if($_POST['zh']!='' and $_POST['mm']!=''){
	$zh = $_POST["zh"];  
	$mm = $_POST["mm"];  

}

		include("../butian.php");
		include_once("../peizhi.php");



		if($_POST['zh']!='' and $_POST['mm']!=''){
   $zhcz="select id,rongliang from yonghu where zhanghao='$zh' and mima='$mm';";
   
	$zhixing1=mysqli_query($lj,$zhcz);
	while($row = mysqli_fetch_array($zhixing1)){
		$yhid=$row['id'];
		$_SESSION["id"]=$yhid;
		$_SESSION["rongliang"]=$row['rongliang'];
	}
}





     	$wangzhi = $_POST["wangzhi"]; 
		$name = $_POST["name"];  
		$yhid=$_SESSION["id"];


		if(pingAddress($wangzhi)){
		
        if($wangzhi==""||$name=="")  
        {  
            echo "<script>alert('请填写完全！'); history.go(-1);</script>";  
        }
		else
		{

		
		$kongjian=0;
		
		$allyhwjdxjs="select wenjiandaxiao from wenjian where yonghu=$yhid;";
		
		$allyhwjdxjs1=mysqli_query($lj,$allyhwjdxjs);
										while($row=mysqli_fetch_array($allyhwjdxjs1)){
											$kongjian=$kongjian+$row['wenjiandaxiao'];	
										}	
		if($kongjian>$_SESSION["rongliang"]){echo "您已无空间！";die;}
		
						$sql1="insert into lxxz(wangzhi,name,yonghu) values('$wangzhi','$name','$yhid')";
						$zhixing2 = mysqli_query($lj,$sql1);
						Header("Location:download.php");

		}
		
		
		
		
		
		}else{
			echo "<script>alert('该网址不可连通!'); history.go(-1);</script>";  
		}
?>
