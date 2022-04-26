<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
include_once("../peizhi.php");

if($_POST["zh"]!=""){
        $zh = $_POST["zh"];  
		$mm = $_POST["mm"];
		 }else if($_GET["zh"]!=""){
			$zh = $_GET["zh"];
			$mm = $_GET["mm"]; 
		 }else if($_GET["dlm"]!=""){
			$dlm=$_GET["dlm"];
			$yhczsql="select zhanghao,mima from yonghu where dengluma='$dlm';";
			$yhcz1=mysqli_query($lj,$yhczsql);
			while($row = mysqli_fetch_array($yhcz1)){
				$zh=$row['zhanghao'];
				$mm=$row['mima'];
			}

		 }else if(isset($_COOKIE["changxiangzh"])&&isset($_COOKIE["changxiangmm"])){
			$zh = $_COOKIE["changxiangzh"];
			$mm = $_COOKIE["changxiangmm"]; 
		 }else{
			 setcookie("changxiangzh", "", time()-3600,"/");
			 setcookie("changxiangmm", "", time()-3600,"/");
			Header("Location:../index.php");
			die;
			 
		 }
		 
		 
		 
		include("../butian.php");
		if($_POST["zh"]==""){$mm=decrypt($mm,$key);}
		  $expire=time()+60*60*24*30;
		  if($zh!=""&&$mm!=""){
		setcookie("changxiangzh", $zh, $expire ,"/");
		setcookie("changxiangmm", $mm, $expire, "/");
 }


 

 
        if($zh == "" || $mm == "")  
        {  
            echo "<script>alert('请输入用户名或密码！');</script>";  
			
			setcookie("changxiangzh", "", time()-3600,"/");
			 setcookie("changxiangmm", "", time()-3600,"/");

			Header("Location:../index.php");
        }  
        else 
        {  

			

		   $zhcz="select zhanghao from yonghu where zhanghao='$zh';";
		   
			$zhixing1=mysqli_query($lj,$zhcz);
			$fanhui1=mysqli_num_rows($zhixing1);
			
			
			if(!$fanhui1){
				echo "<script>alert('账号不存在');</script>";
				setcookie("changxiangzh", "", time()-3600,"/");
				 setcookie("changxiangmm", "", time()-3600,"/");
				 

				Header("Location:../index.php");
				
 
					}
			else{
				$mmcz="select zhanghao,mima from yonghu where zhanghao='$zh' AND mima='$mm';";
				$zhixing2=mysqli_query($lj,$mmcz);
				$fanhui2=mysqli_num_rows($zhixing2);
				if(!$fanhui2){
					echo "<script>alert('密码错误');</script>";
					setcookie("changxiangzh", "", time()-3600,"/");
					 setcookie("changxiangmm", "", time()-3600,"/");

					Header("Location:../index.php");
					
					
				}else
				{



					$id="select id,yonghuming,shoujihao,quanxian,rongliang from yonghu where zhanghao='$zh' AND mima='$mm';";
					$zhixing3=mysqli_query($lj,$id);
					while($row = mysqli_fetch_array($zhixing3)){
						 $_SESSION["id"]=$row['id'];
					    $_SESSION["yonghuming"]=$row['yonghuming'];
						$_SESSION["shoujihao"]=$row['shoujihao'];
						$_SESSION["quanxian"]=$row['quanxian'];	
						$_SESSION["rongliang"]=$row['rongliang'];	
					}
					
					$_SESSION["zh"]=$zh;
					$_SESSION["mm"]=$mm;
					$_SESSION["mulu"]="";
					header("Location:dlcg.php");
					
					
				}
				}
		   
            
        }  
?>
