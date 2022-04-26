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
  if(test!=wz+"/yhcz/xs.php"&&test!=wz+"/yhcz/xs_jxsc.php"){window.history.back(-1);}

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
            <button id="xiayiye" class="btn btn-xs btn-secondary" onclick="location='xs_jxsc.php?yeshu=<?php echo $_GET['yeshu']+1;?>&example-text-input=<?php echo $zyxt;?>&fl=<?php echo $_GET['fl'];?>&yh=<?php echo $_GET['yh'];?>'">></button>
            <button class="btn btn-xs btn-secondary" data-toggle="modal" data-target=".bs-example-modal-lg"">资源嗅探</button>
            </th>
                    </tr>
                  </thead>
                  <form method='get' action='xs_jxsc.php'>
                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myLargeModalLabel">请输入您要嗅探的资源</h4>
                      </div>
                      <div class="modal-body">
                      <input class="form-control" type="text" id="example-text-input" name="example-text-input" placeholder="资源嗅探">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button class="btn btn-primary" name='fl' value="<?php echo $_GET['fl']?>">嗅探</button>
                      </div>
                    </div>
                  </div>
                </div>
                  </form>
           
            </th>
                    </tr>
                  </thead>
                  
                  <tbody>


<?php   

$yhid=$_SESSION["id"];
$_SESSION["mulu2"]="";
if($_GET['mulu2']!=""){$mulu=$_GET['mulu2'];$_SESSION["mulu2"]=$_GET['mulu2'];}else{$mulu=$_SESSION["mulu2"];}


include_once("../butian.php");



//安全检测

$pdjc=0;
if($_GET['mulu2']!=""){
	function shangjibianli($id,$lj,&$pdjc){
	$cxfzmlid="select dangqianmulu,gongxiang2 from mulu where id='$id';";//遍历上级目录

	    $cxfzmlid1=mysqli_query($lj,$cxfzmlid);
	    while($row=mysqli_fetch_array($cxfzmlid1)){
			if($row['gongxiang2']==1){$pdjc=1;}else{shangjibianli($row['dangqianmulu'],$lj,$pdjc);}
		
	} 
}
shangjibianli($mulu,$lj,$pdjc);
}




$zyxt=fansql2ss($_GET["example-text-input"]);	
$ys=0;
if($_GET['yeshu']!=""){$ys=$_GET['yeshu'];}
$qian=$ys*10;
$jilujishuqi=0;


if($mulu==""){$yhwj="select id,wenjianming,wenjiandizhi,wenjiandaxiao,gongxiang,xiazaima1 from wenjian where gongxiang2=1";
$mlcx="select id,name,dangqianmulu,yonghu,time from mulu where gongxiang2=1";
}else{
	$yhwj="select id,wenjianming,wenjiandizhi,wenjiandaxiao,gongxiang,xiazaima1 from wenjian where dangqianmulu='$mulu'";
	$mlcx="select id,name,dangqianmulu,yonghu,time from mulu where dangqianmulu='$mulu'";
}
$zyxt1=HSmhcx($zyxt);
$yhwj=$yhwj." and wenjianming like '$zyxt1'";
$mlcx=$mlcx." and name like '$zyxt1'";


$yhwj=$yhwj." limit $qian,10;";
$mlcx=$mlcx." limit $qian,10;";


if($pdjc==1||$mulu==""){
$mlcx1=mysqli_query($lj,$mlcx);
while($row=mysqli_fetch_array($mlcx1)){
$jilujishuqi=$jilujishuqi+1;
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
            <button class="btn btn-label btn-primary" onclick="location='xs_jxsc.php?mulu2=<?php echo $row['id'];?>'"><label><i class="mdi mdi-folder-open"></i></label> 打开镜像</button>
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
			$jilujishuqi=$jilujishuqi+1;
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
?>
                  </tbody>
</table>


<?php
if($jilujishuqi>=10){
?>
<button class="btn btn-secondary" style="width:100%" onclick="location='xs_zz.php?yeshu=<?php echo $_GET['yeshu']+1;?>&example-text-input=<?php echo $zyxt;?>&fl=<?php echo $_GET['fl'];?>&yh=<?php echo $_GET['yh'];?>'">前往下一页</button>
<?php
}else{
?>
<button class="btn btn-secondary" style="width:100%">没有更多了</button>
<script>
	document.getElementById("xiayiye").onclick="";
</script>


<?php
}
?>
</body>
