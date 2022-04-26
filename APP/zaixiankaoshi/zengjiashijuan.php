<?php   
session_start();
$zzqx=$_SESSION['zaixiankaoshi'];
header("Content-Type: text/html;charset=utf-8");
if	($zzqx==1)
{
?>
<head>
<meta charset="UTF-8">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>畅享考试</title>
<link rel="shortcut icon"href="../../img/logo.png">
</head>
<body  background="../../img/bg.png">
<div align="center">
<h1>畅享在线考试系统</h1>
<form action="zengjiashijuan_2.php" method="POST">
			试卷名：
			<input type="text" name="sjm" maxlength="15">
		
			<button>
				创建
			</button>
			<br>
			</form>
</div>
</form>
</div>
</div>
</div>
</body>
<?php  
}
else{?>
<head>
<meta charset="UTF-8">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>畅享考试</title>
<link rel="shortcut icon"href="../../img/logo.png">
</head>
<body  background="../../img/bg.png">
<div align="center">
<h1>畅享在线考试系统</h1>
<script>alert('您没有权限访问本页');history.go(-1);</script>
</div>
</form>
</div>
</div>
</div>
</body>
<?php 
}
?>
