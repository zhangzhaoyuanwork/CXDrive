<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
$yhid=$_SESSION["id"];
$shijuanid=$_SESSION["shijuanid"];
$sjm=$_SESSION["sjm"];
$timu=$_POST["timu"];
$fenshu=$_POST["fenshu"];
$A=$_POST["A"];
$B=$_POST["B"];
$C=$_POST["C"];
$D=$_POST["D"];
$daan=$_POST["daan"];
include_once("../../peizhi.php");
$zhzc="insert into tiku(timu,leixing,xtdaan,fenshu,shijuanid,yonghuid,a,b,c,d) values('$timu',0,'$daan','$fenshu','$shijuanid','$yhid','$A','$B','$C','$D')";
					$zhixing2 = mysqli_query($lj,$zhzc);
					if (!$zhixing2) {
					echo "<script>alert('输入格式错误！'); history.go(-1);</script>";
					}
					else{
						echo "<script>alert('录入成功'); history.go(-1);</script>";
					}

$zfzj="update shijuan set zongfen=zongfen+'$fenshu' where id='$shijuanid'";
$zhixingzj = mysqli_query($lj,$zfzj);
if (!$zhixingzj) {
	echo "<script>alert('分数增加发生未知错误！'); history.go(-1);</script>";
	}
		
?>