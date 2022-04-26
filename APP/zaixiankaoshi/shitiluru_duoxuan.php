<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
$zzqx=$_SESSION['zaixiakaoshi'];
$shijuanid=$_GET["shijuanid"];
$sjm=$_GET["sjm"];
$_SESSION["shijuanid"]=$shijuanid;
$_SESSION["sjm"]=$sjm;

if	($zzqx!=1)
{
	echo("当前试卷：".$sjm);
?><br><br><br><br>
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


<form name='lurushiti' method='post' action="shitiluru_duoxuan_2.php">

题目：<input type="text" name="timu"></input></br>
分数：<input type="number" name="fenshu"></input></br>
选项A：<input type="text" name="A"></input></br>
选项B：<input type="text" name="B"></input></br>
选项C：<input type="text" name="C"></input></br>
选项D：<input type="text" name="D"></input></br>

正确答案：
<label><input name="daan1" type="checkbox" value="A" />A </label> 
<label><input name="daan2" type="checkbox" value="B" />B </label> 
<label><input name="daan3" type="checkbox" value="C" />C </label> 
<label><input name="daan4" type="checkbox" value="D" />D </label> 

<div align="center">
<button name='luru'>试题录入</button>

</div>
</form>
<?php 
echo '<div style="width:100%;height:100%;"><a href="shitiluru_dx.php?shijuanid='.$shijuanid.'&sjm='.$sjm.'"><b>单选题</b></a>/多选题/<a href="shitiluru_pd.php?shijuanid='.$shijuanid.'&sjm='.$sjm.'"><b>判断题</b></a></div>'
?>  
</body>
</html>


<?php  
} 
else{echo("您似乎没有权限");}
?>




