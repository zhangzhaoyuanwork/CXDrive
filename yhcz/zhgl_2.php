<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
		$yhid=$_SESSION["id"];
        $mm = $_POST["mm"];
		$yhm= $_POST["yhm"];
		$sjh= $_POST["sjh"];
		include("../butian.php");
        if($yhm=="" || $sjh == "" || $mm == "")  
        {  
            echo "<script>alert('请填写完全！'); history.go(-1);</script>";  
        }
		else
		{

				$zhcz="update yonghu set mima='$mm',yonghuming='$yhm',shoujihao=$sjh where id=$yhid";
				include_once("../peizhi.php");
				$zhixing1=mysqli_query($lj,$zhcz);
				if(!$zhixing1)
				{
					echo "未知错误";
				}else{
					$_SESSION["shoujihao"]=$sjh;
					$_SESSION["yonghuming"]=$yhm;
					echo "<script>alert('修改成功！'); history.go(-2);</script>";
					
				}
				
		}
?>
