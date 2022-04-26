<?php   
$ss = $_POST["word"];  
include_once("../../peizhi.php");
$chaxun="select chinese from dictionary where english='$ss'";
$zhixing1=mysqli_query($lj,$chaxun);
		
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		

		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<link href="../../yhcz/css/bootstrap.min.css" rel="stylesheet">
		<link href="../../yhcz/css/materialdesignicons.min.css" rel="stylesheet">
		<link href="../../yhcz/css/style.min.css" rel="stylesheet">
		<script type="text/javascript" src="../../yhcz/js/jquery.min.js"></script>
		<script type="text/javascript" src="../../yhcz/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../yhcz/js/perfect-scrollbar.min.js"></script>
		<script type="text/javascript" src="../../yhcz/js/main.min.js"></script>
		<title>畅享词典</title>
		<link rel="shortcut icon"href="../img/logo.png">
	</head>
	<body>
		<div align="center" style="width: 100%;height: 700px;background:	#EE82EE">
		<div align="center" style="width: 100%;height: 5%;background:	#EE82EE">
		</div>
		<div align="center" style="width: 100%;height: 10%;background:	#EE82EE">
		<h1>畅享词典</h1>
		</div>
		<div align="center" style="width: 100%;height: 20%;background:	#EE82EE">
		<form method="POST" action="dictionary.php" style="width:100%,height:100%">
		<input type="text" name="word" placeholder="请输入您要查询的单词"></input><button name='chaxun'>查询</button>
		</form>
		
		</div>

		<div align="center" style="width: 100%;height: 65%;background:	#FF69B4">
		<h2>
		<?php   
		while($row=mysqli_fetch_array($zhixing1)){
		echo $row['chinese'];
		}
		
		?>
		</h2>
		
		</div>
		</div>
		
	</body>
</html>


