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
  if(test!=wz+"/yhcz/xs.php"&&test!=wz+"/yhcz/xs_zyz.php"&&test!=wz+"/yhcz/xs_zz.php"){window.history.back(-1);}

 }
 function goTo() {
   window.history.forward();
 }

	function rongliang(i,m)
	   {  
		   var win=window.parent;
	      var myElement = win.document.getElementById("yunpanrongliang");
		  var myElement2 = win.document.getElementById("yunpanrongliang2");
		  myElement2.innerHTML=i;
		  myElement.innerHTML=m;
		  myElement.style.width=m;
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
			if($_GET['fl']==""){
			?>
			
			<?php
			  if(!$PC){
			  ?>
			  <br>
			  <?php
			 }
			  ?>
            <button class="btn btn-xs btn-secondary" onclick="goBack('<?php echo $wz;?>')"><</button>
            <button class="btn btn-xs btn-secondary" onclick="goTo()">></button>
            <button class="btn btn-xs btn-secondary"onclick="location='zhantie.php'">粘贴</button>
            <button class="btn btn-xs btn-secondary" data-toggle="modal" data-target=".bs-example-modal-lg"">新建文件夹</button>
			<?php
			}
			?>
			
			<?php
			if($_GET['fl']==""&&$_GET['mulu']==""){
			?>
			<tr>
			          <td>我的镜像</td>
					  <?php
					  if($PC){
					  ?>
					  
					  <td>全部镜像</td>
					  <td>无</td>
					  <?php
					  }
					  ?>
					  <td>
			<button class="btn btn-label btn-primary" onclick="location='xs_wdjx.php'"><label><i class="mdi mdi-folder-open"></i></label> 查看全部镜像</button>
			<button class="btn btn-label btn-purple" onclick="location='xs_jxsc.php'"><label><i class="mdi mdi-content-copy"></i></label> 进入镜像市场</button>
			<button class="btn btn-label btn-warning" onclick="location='jsj.php'"><label><i class="mdi mdi-flip-to-front"></i></label> 进入镜世界</button>
								 
			</td>
			        </tr>
			
			
			
			<?php
			}
			?>

            </th>
                    </tr>
                  </thead>
                  <form name='xj' method='post' action='xjwjj.php'>
                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myLargeModalLabel">请输入文件夹名</h4>
                      </div>
                      <div class="modal-body">
                      <input class="form-control" type="text" id="example-text-input" name="example-text-input" placeholder="新建文件夹">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button class="btn btn-primary" name='xj'>新建</button>
                      </div>
                    </div>
                  </div>
                </div>
                  </form>
                  <tbody>
					  
					  
					  
					 


<?php   


$yhid=$_SESSION["id"];
$_SESSION["mulu"]="";
if($_GET['mulu']!=""){$mulu=$_GET['mulu'];$_SESSION["mulu"]=$_GET['mulu'];}else{$mulu=$_SESSION["mulu"];}




$allyhwj="select id,wenjianming,wenjianleixing,wenjiandizhi,wenjiandaxiao,gongxiang,gongxiang2,xiazaima1 from wenjian where yonghu=$yhid;";
if($mulu==""){$yhwj="select id,wenjianming,wenjianleixing,wenjiandizhi,wenjiandaxiao,gongxiang,gongxiang2,xiazaima1 from wenjian where yonghu=$yhid and dangqianmulu is null";
$mlcx="select id,name,dangqianmulu,yonghu,time,gongxiang2 from mulu where yonghu=$yhid and dangqianmulu is null;";

if($_GET['fl']!=""){
	$yhwj="select id,wenjianming,wenjianleixing,wenjiandizhi,wenjiandaxiao,gongxiang,gongxiang2,xiazaima1 from wenjian where yonghu=$yhid";
	$mlcx="select id,name,dangqianmulu,yonghu,time,gongxiang2 from mulu where yonghu=$yhid;";}


}else{
	$yhwj="select id,wenjianming,wenjianleixing,wenjiandizhi,wenjiandaxiao,gongxiang,gongxiang2,xiazaima1 from wenjian where yonghu=$yhid and dangqianmulu='$mulu'";
	$mlcx="select id,name,dangqianmulu,yonghu,time,gongxiang2 from mulu where yonghu=$yhid and dangqianmulu='$mulu';";
}





if($_GET['fl']==""){
$mlcx1=mysqli_query($lj,$mlcx);
while($row=mysqli_fetch_array($mlcx1)){
?>


                    <tr <?php if($_SESSION["caozuoid"]==$row['id'] and $_SESSION["caozuo"]=="y" and $_SESSION["caozuolx"]=="wjj"){echo "style='opacity:0.5;'";}?>>
					
                      <td><?php echo HSsubstr_cut($row['name']); ?></td>
					  
					  
					  <?php
					  if($PC){
					  ?>
					  <td>文件夹</td>
					  <td><?php echo HSdxjs(HSbianli($lj,$row['id']));?></td>
					  <?php
					 }
					  ?>
					  
					  
					  <td>
            <button class="btn btn-label btn-primary" onclick="location='xs.php?mulu=<?php echo $row['id'];?>'"><label><i class="mdi mdi-folder-open"></i></label> 打开文件夹</button>
            <button class="btn btn-label btn-purple" onclick="location='wjcz.php?lx=<?php echo "wjj";?>&id=<?php echo $row['id'];?>&cz=<?php echo "f";?>'"><label><i class="mdi mdi-content-copy"></i></label> 复制文件夹</button>
            <button class="btn btn-label btn-warning" onclick="location='wjcz.php?lx=<?php echo "wjj";?>&id=<?php echo $row['id'];?>&cz=<?php echo "y";?>'"><label><i class="mdi mdi-flip-to-front"></i></label> 移动文件夹</button>
            <button class="btn btn-label btn-danger" onclick="location='scwjj.php?wjid=<?php echo $row['id'];?>'"><label><i class="mdi mdi-delete-empty"></i></label> 删除文件夹</button>
           
			
			
			<?php
			  if(!$PC){
			  ?>
			  <br>
			  <?php
			 }
			  ?>
			<div class="btn-group" style=" position:absolute; ">
                      <button type="button" class="btn btn-label btn-success"><label><i class="mdi mdi-open-in-new"></i></label>分享至</button>
					  
					  
					  

                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position: absolute; height: 100%;">
                        <span class="caret"></span>
                        <span class="sr-only">切换下拉列表</span>
                      </button>
                      <ul class="dropdown-menu"> 
						 <li <?php if($row['gongxiang2']==1){echo "style='opacity:0.5;'";} ?>><a href="gx.php?wjid=<?php echo $row['id'];?>&wjlx=2&gxlx=2">镜像市场</a></li>
						
                        <li role="separator" class="divider"></li>
						
						<?php
						$txzcz="select id,name from jingshijie where tongxingzheng=$yhid;";
						
						$txzcz1=mysqli_query($lj,$txzcz);
						while($row1=mysqli_fetch_array($txzcz1)){
							$pdmuid=$row['id'];
							$jingshijieid=$row1['id'];
							$zt="select id from jingshijiefenxiang where muluid=$pdmuid and jingshijieid=$jingshijieid;";
							$pdfx="";
							$zhixing1=mysqli_query($lj,$zt);
								while($row5=mysqli_fetch_array($zhixing1)){
									$pdfx=$row5['id'];
								}
							
							
							
							
							
						?>
						<li <?php if($pdfx!=""){echo "style='opacity:0.5;'";}?> ><a href="gx.php?wjid=<?php echo $row['id'];?>&wjlx=2&gxlx=3&jsjid=<?php echo $row1['id'];?>"><?php echo $row1['name'];?></a></li>
						<?php
						}
						?>
                        
                      </ul>
              </div>
			  
			  
			  <?php
			    if(!$PC){
			    ?>
			    <br><br>
			    <?php
			   }
			    ?>
            </td>
                    </tr>
					
<?php
}
}else if($_GET['fl']!=""){
	if($_GET['fl']=="sp"){
		$yhwj=$yhwj." and wenjianfenlei='sp'";
	}else if($_GET['fl']=="tp"){
		$yhwj=$yhwj." and wenjianfenlei='tp'";
	}else if($_GET['fl']=="wd"){
		$yhwj=$yhwj." and wenjianfenlei='wd'";
	}else if($_GET['fl']=="yy"){
		$yhwj=$yhwj." and wenjianfenlei='yy'";
	}
}
$zhixing1=mysqli_query($lj,$yhwj);
		while($row=mysqli_fetch_array($zhixing1)){
			
?>

<tr <?php if($_SESSION["caozuoid"]==$row['id'] and $_SESSION["caozuo"]=="y" and $_SESSION["caozuolx"]=="wj"){echo "style='opacity:0.5;'";}?>>
                      <td><?php echo HSsubstr_cut($row['wenjianming']);?></td>
					  
					  <?php
					  if($PC){
					  ?>
					  
					  <td><?php echo HSsubstr_cut($row['wenjianleixing']);?></td>
                      <td><?php echo HSdxjs($row['wenjiandaxiao'])?></td>
					  
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

            <button class="btn btn-label btn-purple" onclick="location='wjcz.php?lx=<?php echo "wj";?>&id=<?php echo $row['id'];?>&cz=<?php echo "f";?>'"><label><i class="mdi mdi-content-copy"></i></label> 复制</button>
            <button class="btn btn-label btn-warning" onclick="location='wjcz.php?lx=<?php echo "wj";?>&id=<?php echo $row['id'];?>&cz=<?php echo "y";?>'"><label><i class="mdi mdi-flip-to-front"></i></label>剪切</button>
            <button class="btn btn-label btn-danger" onclick="location='sc.php?wjid=<?php echo $row['id'];?>'"><label><i class="mdi mdi-delete-empty"></i></label> 删除</button>
           
			
					<?php
					  if(!$PC){
					  ?>
					  <br>
					  <?php
					 }
					  ?>
			
			<div class="btn-group"  style=" position:absolute; ">
				
	
                      <button type="button" class="btn btn-label btn-success"><label><i class="mdi mdi-open-in-new"></i></label>分享至</button>					  
	
					  
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position: absolute; height: 100%;">
                        <span class="caret"></span>
                        <span class="sr-only">切换下拉列表</span>
                      </button>
                      <ul class="dropdown-menu">
                        <li <?php if($row['gongxiang']==1){echo "style='opacity:0.5;'";} ?>><a href="gx.php?wjid=<?php echo $row['id'];?>&wjlx=1&gxlx=1">畅享资源站</a></li>
						<li <?php if($row['gongxiang2']==1){echo "style='opacity:0.5;'";} ?>><a href="gx.php?wjid=<?php echo $row['id'];?>&wjlx=1&gxlx=2">畅享镜像市场</a></li>
                        <li role="separator" class="divider"></li>
						
						
						
						<?php
						$txzcz="select id,name from jingshijie where tongxingzheng=$yhid;";
						
						$txzcz1=mysqli_query($lj,$txzcz);
						$pdmuid=$row['id'];
						while($row1=mysqli_fetch_array($txzcz1)){
							
							$jingshijieid=$row1['id'];
							$zt="select id from jingshijiefenxiang where wenjianid=$pdmuid and jingshijieid=$jingshijieid;";
							$pdfx="";
							
							
							
							$fxztcz1=mysqli_query($lj,$zt);
								while($row5=mysqli_fetch_array($fxztcz1)){
									$pdfx=$row5['id'];
								}	
								
								
								
						?>
						<li <?php if($pdfx!=""){echo "style='opacity:0.5;'";}?> ><a href="gx.php?wjid=<?php echo $row['id'];?>&wjlx=1&gxlx=3&jsjid=<?php echo $row1['id'];?>"><?php echo $row1['name'];?></a></li>
						<?php
						}
						?>
						
						
						
                      </ul>
              </div>
			  
			  <?php
			    if(!$PC){
			    ?>
			    <br><br>
			    <?php
			   }
			    ?>
            </td>
                    </tr>

<?php

}

?>
                  </tbody>
</table>

<?php

$kongjian=0;

$allyhwjdxjs="select wenjiandaxiao from wenjian where yonghu=$yhid;";

$allyhwjdxjs1=mysqli_query($lj,$allyhwjdxjs);
								while($row=mysqli_fetch_array($allyhwjdxjs1)){
									$kongjian=$kongjian+$row['wenjiandaxiao'];	
								}	







$bili=(string)sprintf("%01.2f",((int)$kongjian/(int)$_SESSION["rongliang"]*100) )."%";

$kongjian=HSdxjs($kongjian)."/".HSdxjs($_SESSION["rongliang"]);	



?>
<script>

	rongliang('<?php echo $kongjian;?>','<?php echo $bili;?>');
</script>


</body>
