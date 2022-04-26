<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
        $zh = $_POST["zh"];  
        $mm = $_POST["mm"]; 
		include("../../butian.php");
        if($zh == "" || $mm == "")  
        {  
            echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";  
        }  
        else 
        {  
           include_once("../../peizhi.php");
		   $zhcz="select zhanghao from yonghu where zhanghao='$zh';";
		   
			$zhixing1=mysqli_query($lj,$zhcz);
			$fanhui1=mysqli_num_rows($zhixing1);
			if(!$fanhui1){
				echo "<script>alert('账号不存在');history.go(-1);</script>";
 
					}
			else{
				$mmcz="select zhanghao,mima from yonghu where zhanghao='$zh' AND mima='$mm';";
				$zhixing2=mysqli_query($lj,$mmcz);
				$fanhui2=mysqli_num_rows($zhixing2);
				if(!$fanhui2){
					echo "<script>alert('密码错误');history.go(-1);</script>";
				}else
				{
					$id="select id,yonghuming,shoujihao,quanxian,zaixiankaoshi from yonghu where zhanghao='$zh' AND mima='$mm';";
					$zhixing3=mysqli_query($lj,$id);
					while($row = mysqli_fetch_array($zhixing3)){
						$_SESSION["id"]=$row['id'];
					    $_SESSION["yonghuming"]=$row['yonghuming'];
						$_SESSION["shoujihao"]=$row['shoujihao'];
						$_SESSION["quanxian"]=$row['quanxian'];
                        $_SESSION["zaixiankaoshi"]=$row['zaixiankaoshi'];
					}
					$_SESSION["zh"]=$zh;
					$_SESSION["mm"]=$mm;
					if($_SESSION["zaixiankaoshi"]==0){header("Location:xuesheng.php");}else if($_SESSION["zaixiankaoshi"]==1){header("location:jiaoshi.php");}else{header("Location:shenfen.php");}
				}
				}
        }  
?>
