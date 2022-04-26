<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
include_once("../peizhi.php");
include_once("../hanshu.php");
$PC=HSpc();
?>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/materialdesignicons.min.css" rel="stylesheet">
<link href="css/style.min.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="js/main.min.js"></script>

<!--图表插件-->
<script type="text/javascript" src="js/Chart.js"></script>
<script>
function goBack(wz) {
  var test = window.location.href;
  if(test!=wz+"/yhcz/xs.php"){window.history.back(-1);}

 }
 function goTo() {
   window.history.forward();
 }




</script>
</head>
<body>
<table class="table table-hover" style="overflow:hidden;">
                  <thead>
                    <tr>
                      <th>文件名</th>
					  <?php
					  if($PC){
					  ?>
					  <th>文件所属</th>
                      <th>大小</th>
					  <?php
					  }
					  ?>

					  
					  
					  <th>操作    
						 <?php
						   if(!$PC){
						   ?>
						   <br>
						   <?php
						  }
						   ?>
            <button class="btn btn-xs btn-secondary" onclick="goBack('<?php echo $wz;?>')"><</button>
            <button class="btn btn-xs btn-secondary" onclick="goTo()">></button>
           
            </th>
                    </tr>
                  </thead>
                  
                  <tbody>


<?php   




$yhid=$_SESSION["id"];
$sjid=$_GET["sjid"];



include_once("../butian.php");

//安全检测
$lywz=$wz."/yhcz/xs.php";
$lywz2=$wz."/yhcz/xs_wdjx.php";
$lywz3=$wz."/yhcz/bcjx.php";



if(BTsjwzhd($lywz)||BTsjwzhd($lywz2)||BTsjwzhd($lywz3)){
	
	
	
	$_SESSION["mulu2"]="";
	if($_GET['mulu2']!=""){$mulu=$_GET['mulu2'];$_SESSION["mulu2"]=$_GET['mulu2'];}else{$mulu=$_SESSION["mulu2"];}

	if($mulu==""){
		$blsj="select id,muluid from baocunjingxiang where yonghu='$yhid';";
	
		$blsj1=mysqli_query($lj,$blsj);
		while($row1=mysqli_fetch_array($blsj1)){
			$sjmuluid=$row1['muluid'];
			
				$mlcx="select id,name,dangqianmulu,yonghu,time from mulu where id='$sjmuluid';";
	
				$mlcx1=mysqli_query($lj,$mlcx);
				while($row=mysqli_fetch_array($mlcx1)){
				
				?>
				
				
				                    <tr <?php if($_SESSION["caozuoid"]==$row['id'] and $_SESSION["caozuo"]=="y" and $_SESSION["caozuolx"]=="wjj"){echo "style='opacity:0.5;'";}?>>
				                      <td><?php echo HSsubstr_cut($row['name']);?></td>
									  
									  
									  <?php
									   if($PC){
									   ?>
									  <td>镜像文件夹</td>
					  
									  <td><?php echo HSdxjs(HSbianli($lj,$row['id']));?></td>
									   <?php
									  }
									   ?>

									  
									  <td>
				            <button class="btn btn-label btn-primary" onclick="location='xs_wdjx.php?mulu2=<?php echo $row['id'];?>'"><label><i class="mdi mdi-folder-open"></i></label> 打开镜像</button>
							<?php
							if($_GET['mulu2']==""){
							?>
							
				            <button class="btn btn-label btn-purple" onclick="location='bcjx.php?wjlx=<?php echo "wjj";?>&wjid=<?php echo $row['id'];?>'"><label><i class="mdi mdi-content-copy"></i></label> 保存镜像</button>
				             <button class="btn btn-label btn-danger" onclick="location='scjx.php?wjid=<?php echo $row1['id'];?>'"><label><i class="mdi mdi-delete-empty"></i></label> 删除镜像</button>
							<?php
				            }
				            ?>
				            </td>
				                    </tr>
				<?php
			
				
				}
				}
				
				$blsj="select id,wenjianid from baocunjingxiang where yonghu='$yhid';";
				$blsj1=mysqli_query($lj,$blsj);
				while($row1=mysqli_fetch_array($blsj1)){
				$sjwjid=$row1['wenjianid'];

				$yhwj="select id,wenjianming,wenjiandizhi,wenjiandaxiao,gongxiang,xiazaima1 from wenjian where id='$sjwjid';";
				$zhixing1=mysqli_query($lj,$yhwj);
						while($row=mysqli_fetch_array($zhixing1)){
				?>
				
				<tr <?php if($_SESSION["caozuoid"]==$row['id'] and $_SESSION["caozuo"]=="y" and $_SESSION["caozuolx"]=="wj"){echo "style='opacity:0.5;'";}?>>
				                      <td><?php echo HSsubstr_cut($row['wenjianming']);?></td>
									  
									  <?php
									   if($PC){
									   ?>
									  <td>镜像文件</td>
				                      <td><?php echo HSdxjs($row['wenjiandaxiao']);?></td>
									   <?php
									  }
									   ?>

									  <td>
				            <button class="btn btn-label btn-primary" onclick="window.parent.newct('<?php echo $wz."/wjcz/".$row['wenjiandizhi'];?>')"><label><i class="mdi mdi-eye-outline"></i></label> 在线浏览</button>
				            
				            <?php
				            if($_GET['mulu2']==""){
				            ?>
				            
				            <button class="btn btn-label btn-purple" onclick="location='bcjx.php?wjlx=<?php echo "wj";?>&wjid=<?php echo $row['id'];?>'"><label><i class="mdi mdi-content-copy"></i></label> 保存镜像</button>
				             <button class="btn btn-label btn-danger" onclick="location='scjx.php?wjid=<?php echo $row1['id'];?>'"><label><i class="mdi mdi-delete-empty"></i></label> 删除镜像</button>
							<?php
				            }
				            ?>
				            </td>
				                    </tr>
				
				<?php
				}	
				
			
			}
	
			

	
	
	}else{
		$yhwj="select id,wenjianming,wenjiandizhi,wenjiandaxiao,gongxiang,xiazaima1 from wenjian where dangqianmulu='$mulu';";
		$mlcx="select id,name,dangqianmulu,yonghu,time from mulu where dangqianmulu='$mulu';";
	

	$mlcx1=mysqli_query($lj,$mlcx);
	while($row=mysqli_fetch_array($mlcx1)){
	
	?>
	
	
	                    <tr <?php if($_SESSION["caozuoid"]==$row['id'] and $_SESSION["caozuo"]=="y" and $_SESSION["caozuolx"]=="wjj"){echo "style='opacity:0.5;'";}?>>
	                      <td><?php echo HSsubstr_cut($row['name']);?></td>
						  
						  <?php
						   if($PC){
						   ?>
						  <td>镜像文件夹</td>
		  
						  <td><?php echo HSdxjs(HSbianli($lj,$row['id']));?></td>
						   <?php
						  }
						   ?>

						  
						  <td>
	            <button class="btn btn-label btn-primary" onclick="location='xs_wdjx.php?mulu2=<?php echo $row['id'];?>'"><label><i class="mdi mdi-folder-open"></i></label> 打开镜像</button>
				<?php
				if($_GET['mulu2']==""){
				?>
				
	            <button class="btn btn-label btn-purple" onclick="location='bcjx.php?wjlx=<?php echo "wjj";?>&wjid=<?php echo $row['id'];?>'"><label><i class="mdi mdi-content-copy"></i></label> 保存镜像</button>
	            <?php
	            }
	            ?>
	            </td>
	                    </tr>
	<?php
	}
	$zhixing1=mysqli_query($lj,$yhwj);
			while($row=mysqli_fetch_array($zhixing1)){
	?>
	
	<tr <?php if($_SESSION["caozuoid"]==$row['id'] and $_SESSION["caozuo"]=="y" and $_SESSION["caozuolx"]=="wj"){echo "style='opacity:0.5;'";}?>>
	                      <td><?php echo HSsubstr_cut($row['wenjianming']);?></td>
						  <?php
						   if($PC){
						   ?>
						  <td>镜像文件</td>
	                      <td><?php echo HSdxjs($row['wenjiandaxiao']);?></td>
						   <?php
						  }
						   ?>

						  <td>
	            <button class="btn btn-label btn-primary" onclick="window.parent.newct('<?php echo $wz."/wjcz/".$row['wenjiandizhi'];?>')"><label><i class="mdi mdi-eye-outline"></i></label> 在线浏览</button>
	            
	            <?php
	            if($_GET['mulu2']==""){
	            ?>
	            
	            <button class="btn btn-label btn-purple" onclick="location='bcjx.php?wjlx=<?php echo "wj";?>&wjid=<?php echo $row['id'];?>'"><label><i class="mdi mdi-content-copy"></i></label> 保存镜像</button>
	            <?php
	            }
	            ?>
	            </td>
	                    </tr>
	
	<?php
	}
	}
	
	
}else{die();}
?>
                  </tbody>
</table>
</body>
