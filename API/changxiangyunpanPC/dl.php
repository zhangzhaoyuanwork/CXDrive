<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
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
		   $zhcz="select zhanghao from yonghu where zhanghao='$zh';";
		   
			$zhixing1=mysqli_query($lj,$zhcz);
			$fanhui1=mysqli_num_rows($zhixing1);
			
			
			if(!$fanhui1){
				echo "《账号不存在》";
 
					}
			else{
				$mmcz="select zhanghao,mima from yonghu where zhanghao='$zh' AND mima='$mm';";
				$zhixing2=mysqli_query($lj,$mmcz);
				$fanhui2=mysqli_num_rows($zhixing2);
				if(!$fanhui2){
					echo "《密码错误》";
				}else
				{
					$id="select id,yonghuming,shoujihao,quanxian,qun1,qun2,qun3,qun4,name1,name2,name3,name4,quanxian from yonghu where zhanghao='$zh' AND mima='$mm';";
					$zhixing3=mysqli_query($lj,$id);
					while($row = mysqli_fetch_array($zhixing3)){
						 $_SESSION["id"]=$row['id'];
					    $_SESSION["yonghuming"]=$row['yonghuming'];
						$_SESSION["shoujihao"]=$row['shoujihao'];
						$_SESSION["quanxian"]=$row['quanxian'];
						$_SESSION["qun1"]=$row['qun1'];
						$_SESSION["qun2"]=$row['qun2'];
						$_SESSION["qun3"]=$row['qun3'];
						$_SESSION["qun4"]=$row['qun4'];
						$_SESSION["name1"]=$row['name1'];
						$_SESSION["name2"]=$row['name2'];
						$_SESSION["name3"]=$row['name3'];
						$_SESSION["name4"]=$row['name4'];
						$_SESSION["quanxian"]=$row['quanxian'];
					}
					$_SESSION["zh"]=$zh;
					$_SESSION["mm"]=$mm;
					
					echo "《登陆成功》";
				}
				}
		   
            
        }  
?>
