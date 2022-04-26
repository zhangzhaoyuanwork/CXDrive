<head>
<meta charset="UTF-8">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
</head>
<body bgcolor="#87cefa">
<?php
session_start();
	header("Content-Type: text/html;charset=utf-8");
	$mm = $_POST["mm"];
	$yhid=$_SESSION["id"];
	$yhm=$_SESSION["yonghuming"];
	$dh=$_SESSION["shoujihao"];
	include("../../butian.php");
	include_once("../../peizhi.php");
	$zhcz="select id from yonghu where id='$yhid' and mima='$mm';";
	$zhixing1=mysqli_query($lj,$zhcz);
	$fanhui1=mysqli_num_rows($zhixing1);
	
	
	if(!$fanhui1){
		echo "<script>alert('密码错误！'); history.go(-2);</script>";
	}else{
		
	
	?>
		
		<div align="center">
		<div align="center" style="width: 500px;height: 600px;">
			<h1>用户信息</h1>
			<form action="zhgl_2.php" method="POST"">
			名字：
			<input type="text" name="yhm" maxlength="15" value="<?= $yhm ?>">
			<br>
			密码：
			<input type="password" name="mm" maxlength="15" value="<?= $mm ?>">
			<br>
			电话：
			<input type="text" name="sjh" maxlength="15" value="<?= $dh ?>">
			<br>
			<button>
				修改
			</button>
			<br>
			</form>
		</div>	
		</div>
		<?php
		}
		?>
	</body>