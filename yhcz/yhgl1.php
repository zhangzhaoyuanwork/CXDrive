<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
include_once("../peizhi.php");
include("../butian.php");
$zzqx=$_SESSION['quanxian'];


if($_POST["wdmm"]==""){
if($zzqx==2||$zzqx==1)
{
	
	$zh = $_POST["zh"];
	
	$zhcz="select yonghuming,mima,shoujihao,quanxian from yonghu where zhanghao='$zh';";
	$zhixing1=mysqli_query($lj,$zhcz);
	while($row = mysqli_fetch_array($zhixing1)){
					    $yhm=$row['yonghuming'];
						$mm=decrypt($row['mima'],$key);
						$dh=$row['shoujihao'];
						$qx=$row['quanxian'];
					}
	$fanhui1=mysqli_num_rows($zhixing1);
	
	
	if(!$fanhui1){
		echo "<script>alert('无该账号！'); history.go(-2);</script>";
	}else{
		
	
	?>
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
	<div align="center">
		<div align="center" style="width: 100%;">
		<div align="center" style="width: 100%;">

			<div class="card">
				
												<?php
												if($zzqx==2){
				
												?>

						 <div class="card-header"><h4>用户信息(注意：权限0为用户，1为管理员，2为站长)</h4></div>	
													<?php
													}
							
													?>
			             
						  
						  
						  
						  
			              <div class="card-body">
			                
			                <form action="yhgl2.php?yszh=<?= $zh ?>" method="post">
								<div class="form-group">
								  <label for="example-nf-email">名字</label>
								  <input class="form-control" type="text" id="yhm" name="yhm" value="<?= $yhm ?>">
								</div>
			                  <div class="form-group">
			                    <label for="example-nf-email">账号</label>
			                    <input class="form-control" type="text" id="zh" name="zh" value="<?= $zh ?>">
			                  </div>
							  <div class="form-group">
							    <label for="example-nf-email">密码</label>
							    <input class="form-control" type="password" id="mm" name="mm" value="<?= $mm ?>">
							  </div>
							  <div class="form-group">
							    <label for="example-nf-email">电话</label>
							    <input class="form-control" type="text" id="sjh" name="sjh" value="<?= $dh ?>">
							  </div>
							  <?php
							  if($zzqx==2){
							  
								?>
							  <div class="form-group">
							    <label for="example-nf-email">权限</label>
							    <input class="form-control" type="text" id="qx" name="qx" value="<?= $qx ?>">
							  </div>
			
										<?php
										}
			
											?>
			                  <div class="form-group">
			                    <button class="btn btn-primary" type="submit">修改</button>
			                  </div>
			                </form>
			                
			              </div>
			            </div>
			
			
			
			
		</div>	
		</div>
		</div>
		</body>
		<?php
		}
		}
		
		}else{
			$zh=$_SESSION["zh"];
			$mm=encrypt($_POST["wdmm"], $key);
			
			
			
			$zhcz="select yonghuming,mima,shoujihao from yonghu where zhanghao='$zh' and mima='$mm';";
			$zhixing1=mysqli_query($lj,$zhcz);
			while($row = mysqli_fetch_array($zhixing1)){
							    $yhm=$row['yonghuming'];
								$mm=decrypt($row['mima'],$key);
								$dh=$row['shoujihao'];
								$qx=$row['quanxian'];
							}
			$fanhui1=mysqli_num_rows($zhixing1);
			
			
			if(!$fanhui1){
				echo "<script>alert('密码错误！'); history.go(-1);</script>";
			}else{
				
			
			?>
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
			<div align="center">
				<div align="center" style="width: 100%;">
				<div align="center" style="width: 100%;">
			
					<div class="card">
						
														

								  
					              <div class="card-body">
					                
					                <form action="yhgl2.php" method="post">
										<div class="form-group">
										  <label for="example-nf-email">名字</label>
										  <input class="form-control" type="text" id="yhm" name="yhm" value="<?= $yhm ?>">
										</div>
									  <div class="form-group">
									    <label for="example-nf-email">密码</label>
									    <input class="form-control" type="password" id="mm" name="mm" value="<?= $mm ?>">
									  </div>
									  <div class="form-group">
									    <label for="example-nf-email">电话</label>
									    <input class="form-control" type="text" id="sjh" name="sjh" value="<?= $dh ?>">
									  </div>
					                  <div class="form-group">
					                    <button class="btn btn-primary" type="submit">修改</button>
					                  </div>
					                </form>
					                
					              </div>
					            </div>
					
					
					
					
				</div>	
				</div>
				</div>
				</body>
				<?php
				}
			
			
		}
		?>