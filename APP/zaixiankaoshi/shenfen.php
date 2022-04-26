<?php   
session_start();
$zzqx=$_SESSION['zaixiakaoshi'];
header("Content-Type: text/html;charset=utf-8");
if	($zzqx=="")
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
<form action="shenfen_2.php" method="post"> 
检测到您首次使用本系统,请选择您的身份<br /><br /> 
<label><input name="shenfen" type="radio" value="1" />教师 </label> 
<label><input name="shenfen" type="radio" value="0" />学生 </label> 
<button name='denglu'>确定</button>&emsp;&emsp;&emsp;
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
<form action="shenfen_2.php" method="post"> 
您正在使用身份切换,请重新选择您的新身份<br /><br /> 
<label><input name="shenfen" type="radio" value="1" />教师 </label> 
<label><input name="shenfen" type="radio" value="0" />学生 </label> 
<button name='denglu'>确定</button>&emsp;&emsp;&emsp;
</form> 
</div>
</form>
</div>
</div>
</div>
</body>
<?php 
}
?>