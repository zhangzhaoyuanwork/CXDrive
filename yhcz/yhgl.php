<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
$zzqx=$_SESSION['quanxian'];

if($_GET["zhgl"]==""){
if($zzqx==2||$zzqx==1)
{
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/materialdesignicons.min.css" rel="stylesheet">
		<link href="css/style.min.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/perfect-scrollbar.min.js"></script>
		<script type="text/javascript" src="js/main.min.js"></script>
		
		<!--图表插件-->
		<script type="text/javascript" src="js/Chart.js"></script>

	</head>
	<body>
	<div align="center" style="width: 100%;">
		<div class="card">
		              <div class="card-header"><h4>请输入您要修改的用户账号</h4></div>
		              <div class="card-body">
		                
		                <form action="yhgl1.php" method="post">
		                  <div class="form-group">
		                    <label for="example-nf-email">账号</label>
		                    <input class="form-control" type="text" id="zh" name="zh" placeholder="请输入账号" maxlength="15">
		                  </div>

		                  <div class="form-group">
		                    <button class="btn btn-primary" type="submit">确认</button>
		                  </div>
		                </form>
		                
		              </div>
		            </div>

		</div>
	</body>
</html>


<?php  
} 
else{echo("您似乎没有权限");}




}else{
	
	?>
	
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<meta content="yes" name="apple-mobile-web-app-capable">
			<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/materialdesignicons.min.css" rel="stylesheet">
			<link href="css/style.min.css" rel="stylesheet">
			<script type="text/javascript" src="js/jquery.min.js"></script>
			<script type="text/javascript" src="js/bootstrap.min.js"></script>
			<script type="text/javascript" src="js/perfect-scrollbar.min.js"></script>
			<script type="text/javascript" src="js/main.min.js"></script>
			
			<!--图表插件-->
			<script type="text/javascript" src="js/Chart.js"></script>
	
		</head>
		<body>
		<div align="center" style="width: 100%;">
			<div class="card">
			              <div class="card-header"><h4>请输入再次确认您的密码</h4></div>
			              <div class="card-body">
			                
			                <form action="yhgl1.php" method="post">
			                  <div class="form-group">
			                    <label for="example-nf-email">密码</label>
			                    <input class="form-control" type="password" id="wdmm" name="wdmm" placeholder="请输入密码">
			                  </div>
	
			                  <div class="form-group">
			                    <button class="btn btn-primary" type="submit">确认</button>
			                  </div>
			                </form>
			                
			              </div>
			            </div>
	
			</div>
		</body>
	</html>
	
	<?php
	
}
?>


