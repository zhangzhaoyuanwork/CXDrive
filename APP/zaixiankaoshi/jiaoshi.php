<?php   
session_start();
$zzqx=$_SESSION['zaixiakaoshi'];
header("Content-Type: text/html;charset=utf-8");
if	($zzqx!=1)
{
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<title>教师界面</title>
		<link rel="shortcut icon"href="../img/logo.png">
	</head>
	<body align="center" style="background: #4afcff;height: 700px;width: 100%;">
		<div align="center" style="background: #5deaff;width: 100%;height: 10%;">
			<font size="10">
			教师界面
            </font>
            
			<div align="right" style="background: #4bd8ff;width: 8%;height: 100%;float: right;">
				<button style="margin-top: 5%;">
				<a href="../../yhcz/zhgl.html">
				<font size="5">
				账号管理
				</font>	
				</a>
				</button>
				
            </div>
            <div align="right" style="background: #4bd8ff;width: 8%;height: 100%;float: right;">
				<button style="margin-top: 5%;">
				<a href="zengjiashijuan.php">
				<font size="5">
				增加试卷
				</font>	
				</a>
				</button>
            </div>
            <div align="right" style="background: #4bd8ff;width: 8%;height: 100%;float: right;">
				<button style="margin-top: 5%;">
				<a href="shenfen.php">
				<font size="5">
				身份切换
				</font>	
				</a>
				</button>
			</div>
			
		</div>
		
		<div style="width: 100%;height: 90%;">
			
			<div style=" background: #81fffb;width: 20%;height: 100%;float: left;">
				<a href="xs.php" target="xianshi"><h1>所有试卷</h1></a>
			</div>
			<div style="background: #afffe2;width: 80%;height: 100%;float:right;">
				<iframe src="xs.php" width="100%" height="100%" scrolling="yes" name="xianshi"/>
			</div>
		</div>
	
	</body>
</html>


<?php  
} 
else{echo("您似乎没有权限");}
?>


