<?php
header("Content-Type: text/html;charset=utf-8");
        $zh = $_POST["zh"];  
        $mm = $_POST["mm"];
		$qrmm = $_POST["qrmm"];
		$yhm= $_POST["yhm"];
		$sjh= $_POST["sjh"];
		include("../../butian.php");
        if($yhm=="" || $zh == "" || $mm == "" || $qrmm == "")  
        {  
            echo "《请填写必填项！》";  
        }
		else
		{
			if($mm!=$qrmm)
			{
				echo "《两次密码不一致！》";
			}
			else
			{
				$zhcz="select zhanghao from yonghu where zhanghao='$zh';";
				include_once("../../peizhi.php");
				$zhixing1=mysqli_query($lj,$zhcz);
				$fanhui1=mysqli_num_rows($zhixing1);
				if(!$fanhui1)
				{
					$zhzc="insert into yonghu(zhanghao,mima,yonghuming,shoujihao) values('$zh','$mm','$yhm','$sjh')";
					$zhixing2 = mysqli_query($lj,$zhzc);
					if (!$zhixing2) {
					echo "《输入格式错误！账号与手机号必须由数字构成！》";
					}
					else{
						echo "《注册成功！请返回登录!》";
					}
				}else{
					echo "《账号已存在》";
				}
			}
		}
?>
