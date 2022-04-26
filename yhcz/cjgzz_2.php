<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
        $zm = $_POST["zm"];  
        $jrm = $_POST["mm"];
		$yhid=$_SESSION["id"];
		$qun1=$_SESSION["qun1"];
		$qun2=$_SESSION["qun2"];
		$qun3=$_SESSION["qun3"];
		$qun4=$_SESSION["qun4"];
        if($zm==""||$jrm=="")  
        {  
            echo "<script>alert('请填写必填项！'); history.go(-1);</script>";  
        }
		else
		{
		
				$zhcz="select id from gzz where jinruma='$jrm';";
				include_once("../peizhi.php");
				$zhixing1=mysqli_query($lj,$zhcz);
				$fanhui1=mysqli_num_rows($zhixing1);
				if(!$fanhui1)
				{
					
						$sql1="insert into gzz(zuming,jinruma,zuzhangid) values('$zm','$jrm','$yhid')";
						$zhixing2 = mysqli_query($lj,$sql1);
						if (!$zhixing2) {
							echo "<script>alert('输入格式错误！'); history.go(-2);</script>";
						}
						else{
							$zhcz="select id from gzz where jinruma='$jrm';";
							$zhixing1=mysqli_query($lj,$zhcz);
							while($row=mysqli_fetch_array($zhixing1)){
								$qunid=$row["id"];
							}
							
							if($qun1==""){
							$sql11="update yonghu set qun1='$qunid',name1='$zm' where id='$yhid'";
							$zhixing111 = mysqli_query($lj,$sql11);
							$_SESSION["qun1"]=$qunid;
							$_SESSION["name1"]=$zm;}else if($qun2==""){
								$sql11="update yonghu set qun2='$qunid',name2='$zm' where id='$yhid'";
								$zhixing111 = mysqli_query($lj,$sql11);
								$_SESSION["qun2"]=$qunid;
								$_SESSION["name2"]=$zm;
							}else if($qun3==""){
								$sql11="update yonghu set qun3='$qunid',name3='$zm' where id='$yhid'";
								$zhixing111 = mysqli_query($lj,$sql11);
								$_SESSION["qun3"]=$qunid;
								$_SESSION["name3"]=$zm;
							}else if($qun4==""){
								$sql11="update yonghu set qun4='$qunid',name4='$zm' where id='$yhid'";
								$zhixing111 = mysqli_query($lj,$sql11);
								$_SESSION["qun4"]=$qunid;
								$_SESSION["name4"]=$zm;
							}else{
								echo "<script>alert('进入群组达到上限！'); history.go(-2);</script>";
							}
							echo "<script>alert('创建成功！'); history.go(-2);</script>";
						}
				}else{
					echo "<script>alert('加入码已存在！'); history.go(-2);</script>";
				}
		}
?>
