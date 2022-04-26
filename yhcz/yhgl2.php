<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
$zzqx=$_SESSION['quanxian'];
$yhid=$_SESSION["id"];
include_once("../peizhi.php");

if($_POST["zh"]!=""){
if($zzqx==2||$zzqx==1)
{

	
		$zh=$_POST["zh"];
		$yszh=$_GET["yszh"];
        $mm = $_POST["mm"];
		$yhm= $_POST["yhm"];
		$sjh= $_POST["sjh"];
		$qx= $_POST["qx"];
		
		

		include("../butian.php");
			
		
		
        if($zh=="" || $yhm=="" || $sjh == "" || $mm == "" || $qx == "")  
        {  
            echo "<script>alert('请填写完全！'); history.go(-1);</script>";  
        }
		else
		{
			if($qx!=1 && $qx!=2 && $qx!=0)
			{
				echo "<script>alert('格式错误！'); history.go(-2);</script>";
			}
			else
			{
				

				$zhcz="update yonghu set zhanghao='$zh',mima='$mm',yonghuming='$yhm',shoujihao=$sjh";
				if($zzqx==2){$zhcz=$zhcz.",quanxian=$qx";}
				 $zhcz=$zhcz." where zhanghao='$yszh';";
				
				
				$zhixing1=mysqli_query($lj,$zhcz);
				if(!$zhixing1)
				{
					echo "<script>alert('格式错误！'); history.go(-2);</script>";
				}else{
					echo "<script>alert('修改成功！'); history.go(-2);</script>";
					
				}
			}	
		}
		}
		
		
		
		
		}else{
			
			$mm = $_POST["mm"];
			$yhm= $_POST["yhm"];
			$sjh= $_POST["sjh"];
			include("../butian.php");
			$zhcz="update yonghu set mima='$mm',yonghuming='$yhm',shoujihao=$sjh where id=$yhid;";
			$zhixing1=mysqli_query($lj,$zhcz);
			
			if(!$zhixing1)
			{
				echo "<script>alert('格式错误！'); history.go(-2);</script>";
			}else{
				echo "<script>alert('修改成功！'); history.go(-2);</script>";
				
			}
		}
?>
