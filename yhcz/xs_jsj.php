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
	
	<?php
	  if(!$PC){
	  ?>
	  <br>
	  <?php
	 }
	  ?>
<table class="table table-hover" style="overflow:hidden;">
                  <thead>
                    <tr>
                      <th>文件名</th>
					  <?php
					  if($PC){
					  ?>
					  <th>文件类型</th>
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
$jsjid2=$_GET["sjid"];
$cstxzccz="select jinruma from jingshijie where id=$jsjid2;";
$cstxzccz1=mysqli_query($lj,$cstxzccz);
	while($row=mysqli_fetch_array($cstxzccz1)){
		$ssjrm=$row['jinruma'];
	}
	$cstxzccz="select id from jingshijie where jinruma='$ssjrm' and tongxingzhengleibie='创世通行证';";
	$cstxzccz1=mysqli_query($lj,$cstxzccz);
	while($row=mysqli_fetch_array($cstxzccz1)){
		$sjid=$row['id'];
	}




include_once("../butian.php");

//安全检测
$lywz=$wz."/yhcz/jsj.php";
$lywz2=$wz."/yhcz/xs_jsj.php";


if(BTsjwzhd($lywz)||BTsjwzhd($lywz2)){
	
	
	
	$_SESSION["mulu2"]="";
	if($_GET['mulu2']!=""){$mulu=$_GET['mulu2'];$_SESSION["mulu2"]=$_GET['mulu2'];}else{$mulu=$_SESSION["mulu2"];}

	if($mulu==""){
		$blsj="select id,muluid from jingshijiefenxiang where jingshijieid='$sjid';";
	
		$blsj1=mysqli_query($lj,$blsj);
		while($row=mysqli_fetch_array($blsj1)){
			$sjmuluid=$row['muluid'];

	
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
				            <button class="btn btn-label btn-primary" onclick="location='xs_jsj.php?mulu2=<?php echo $row['id'];?>'"><label><i class="mdi mdi-folder-open"></i></label> 打开镜像</button>
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
				}
			
			
			$blsj="select id,wenjianid from jingshijiefenxiang where jingshijieid='$sjid';";

				
			$blsj1=mysqli_query($lj,$blsj);
			while($row=mysqli_fetch_array($blsj1)){
				$sjwjid=$row['wenjianid'];

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
				                      <td><?php echo round($row['wenjiandaxiao']/1024/1024,2)?>M</td>
									    <?php
									   }
									    ?>

									  <td>
										  
										  <?php
										  if($PZwjll==1||$_SESSION['quanxian']==2||$_SESSION['quanxian']==1){
										  ?>	
				            <button class="btn btn-label btn-primary" onclick="window.parent.newct('<?php echo $wz."/wjcz/".$row['wenjiandizhi'];?>')"><label><i class="mdi mdi-eye-outline"></i></label> 在线浏览</button>
				              <?php
				              }
				              ?>	
							  
							   <button class="btn btn-label btn-info" onmouseout="parent.erweimaxiaohui()" onmouseover="parent.erweimaxianshi('<?php echo $wz;?>'+'/yhcz/xiazai.php?xiazaima='+'<?php echo $row['xiazaima1'];?>')" onclick="location='xiazai.php?xiazaima=<?php echo $row['xiazaima1'];?>'"><label><i class="mdi mdi-arrow-down-bold"></i></label> 下载</button>
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
	            <button class="btn btn-label btn-primary" onclick="location='xs_jsj.php?mulu2=<?php echo $row['id'];?>'"><label><i class="mdi mdi-folder-open"></i></label> 打开镜像</button>
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
	                      <td><?php echo round($row['wenjiandaxiao']/1024/1024,2)?>M</td>
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
