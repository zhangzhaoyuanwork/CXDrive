<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta charset="UTF-8">
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
		<link href="../../yhcz/css/bootstrap.min.css" rel="stylesheet">
		<link href="../../yhcz/css/materialdesignicons.min.css" rel="stylesheet">
		<link href="../../yhcz/css/style.min.css" rel="stylesheet">
		<script type="text/javascript" src="../../yhcz/js/jquery.min.js"></script>
		<script type="text/javascript" src="../../yhcz/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../yhcz/js/perfect-scrollbar.min.js"></script>
		<script type="text/javascript" src="../../yhcz/js/main.min.js"></script>
		
		<!--图表插件-->
		<script type="text/javascript" src="../../yhcz/js/Chart.js"></script>
	</head>
	<body bgcolor="#429bad">

		<div align="center" style="width: 100%;height: 100%;background: #429bad;">
			<h3>畅享云VIP解析轻应用</h3>
		<h3>当前用户:
		<?php
		echo $_GET["changxiangname"];
		?>
		</h3>
			<form action="vip.php" method="POST">

			
			<input type="text" name="lianjie" maxlength="10000">
						<select name="jiekou" method="POST">
				                    <option value = "1">接口1</option>
				                    <option value = "2">接口2</option>
				                    <option value = "3">接口3</option>
				                    <option value = "4">接口4</option>
									<option value = "5">接口5</option>
									<option value = "6">接口6</option>
									<option value = "7">接口7</option>
									<option value = "8">接口8</option>
									<option value = "9">接口9</option>
									<option value = "10">接口10</option>
									<option value = "11">接口11</option>
									<option value = "12">接口12</option>
									<option value = "13">接口13</option>
									<option value = "14">接口14</option>
									<option value = "15">接口15</option>
									<option value = "16">接口16</option>
									<option value = "17">接口17</option>
									<option value = "18">接口18</option>
									<option value = "19">接口19</option>
									<option value = "20">接口20</option>
				          </select>
			<button>
				确认
			</button>
			 <input type="reset" value="清空">
			<br>
			</form>
			
		<P>
			本APP为非盈利性APP，页内无任何广告。<br>
			仅供学习交流使用，请切勿用于商业用途。<br>
			视频中广告还请大家不要轻易相信。<br>
		</P>
		</div>	
		<br>

		
	</body>
</html>
