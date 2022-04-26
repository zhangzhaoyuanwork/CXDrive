<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
		$zh=$_POST["zh"];	
		$qrmm=$_POST["qrmm"];	
        $mm = $_POST["mm"];
		$yhm = $_POST["yhm"];
		$sjh= $_POST["sjh"];
		include("../../butian.php");
		include_once("../../peizhi.php");
		
        if($yhm=="" || $sjh == "" || $mm == "")  
        {  
            echo "《请填写完全！》";  
        }
		else
		{
			if($mm!=$qrmm)
			{
				echo "《两次密码不一致！》";
			}
			else
			{

				$zhcz="update yonghu set mima='$mm',yonghuming='$yhm',shoujihao='$sjh' where zhanghao='$zh'";
				
				$zhixing1=mysqli_query($lj,$zhcz);
				if(!$zhixing1)
				{
					echo "《未知错误》";
				}else{
					echo "《修改成功！即将为您重新登录！》";
				}
			}
				
		}
?>
