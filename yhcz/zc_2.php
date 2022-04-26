<?php
header("Content-Type: text/html;charset=utf-8");
        $zh = $_POST["zh"];  
        $mm = $_POST["mm"]; 
		$qrmm = $_POST["qrmm"];
		$yhm= $_POST["yhm"];
		$sjh= $_POST["sjh"];
		include("../butian.php");
			
		
        if($yhm=="" || $zh == "" || $mm == "" || $qrmm == ""|| $sjh == "")  
        {  
            echo "<script>alert('请填写必填项！'); history.go(-1);</script>";  
        }
		else
		{
			if($mm!=$qrmm)
			{
				echo "<script>alert('两次密码不一致！'); history.go(-1);</script>";
			}
			else
			{
				$zhcz="select zhanghao from yonghu where zhanghao='$zh';";
				include_once("../peizhi.php");
				$zhixing1=mysqli_query($lj,$zhcz);
				$fanhui1=mysqli_num_rows($zhixing1);
				if(!$fanhui1)
				{
					$zhzc="insert into yonghu(zhanghao,mima,yonghuming,shoujihao) values('$zh','$mm','$yhm','$sjh')";
					$zhixing2 = mysqli_query($lj,$zhzc);
					if (!$zhixing2) {
					echo "<script>alert('输入格式错误！'); history.go(-1);</script>";
					}
					else{
						echo "<script>alert('注册成功！返回登陆！'); history.go(-2);</script>";
					}
				}else{
					echo "<script>alert('账号已存在'); history.go(-2);</script>";
				}
			}
		}
?>
