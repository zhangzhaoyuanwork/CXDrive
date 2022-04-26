<?php   
session_start();
$zzqx=$_SESSION['quanxian'];
header("Content-Type: text/html;charset=utf-8");
if	($zzqx==1)
{
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<title>管理员工具</title>
		<link rel="shortcut icon"href="../img/logo.png">
	</head>
	<body align="center" style="background: #4afcff;height: 700px;width: 100%;">
		<div align="center" style="background: #5deaff;width: 100%;height: 10%;">
			<font size="10">
			管理员工具
			</font>
			
			</div>
			
		</div>
		
		<div style="width: 100%;height: 90%;">
			
			<div style="background: #81fffb;width: 20%;height: 100%;float: left;">
				
				<br>
				<a href="zzkfs.php"target="xianshi"><h1>开放式共享管理</h1></a>
			</div>
			<div style="background: #afffe2;width: 80%;height: 100%;float:right;">
				<iframe src="zzkfs.php" width="100%" height="100%" scrolling="yes" name="xianshi"/>
			</div>
		</div>
	
	</body>
</html>

<?php  
} 
else{echo("您似乎没有权限");}
?>


