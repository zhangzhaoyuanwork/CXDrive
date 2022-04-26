<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
include_once("../peizhi.php");

include_once("../hanshu.php");
$PC=HSpc();
?>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link href="../yhcz/css/bootstrap.min.css" rel="stylesheet">
<link href="../yhcz/css/materialdesignicons.min.css" rel="stylesheet">
<link href="../yhcz/css/style.min.css" rel="stylesheet">
<script type="text/javascript" src="../yhcz/js/jquery.min.js"></script>
<script type="text/javascript" src="../yhcz/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../yhcz/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="../yhcz/js/main.min.js"></script>

<!--图表插件-->
<script type="text/javascript" src="../yhcz/js/Chart.js"></script>
<script>
function goBack(wz) {
  var test = window.location.href;
  if(test!=wz+"/APP/APP.php"){window.history.back(-1);}

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
                      <th>应用名</th>
					  <th>发布时间</th>
					  <th>操作   
						  
						  <?php
						    if(!$PC){
						    ?>
						    <br>
						    <?php
						   }
						    ?>
            <button class="btn btn-xs btn-secondary" onclick="goBack('<?php echo $wz;?>')"><</button>
            <button id="xiayiye" class="btn btn-xs btn-secondary" onclick="location='xs_zz.php?yeshu=<?php echo $_GET['yeshu']+1;?>&&example-text-input=<?php echo $zyxt;?>'">></button>
            <button class="btn btn-xs btn-secondary" data-toggle="modal" data-target=".bs-example-modal-lg"">应用查找</button>
			<?php
			  if(!$PC){
			  ?>
			  <br>
			  <?php
			 }
			  ?>
			<button class="btn btn-xs btn-secondary" onclick="location='fbyyy.html'">发布云应用</button>
			<button class="btn btn-xs btn-secondary" onclick="location='APP.php?yz=1'">优质应用</button>
			<?php
			  if(!$PC){
			  ?>
			  <br>
			  <?php
			 }
			  ?>
			<button class="btn btn-xs btn-secondary" onclick="location='APP.php?my=1'">我的云应用</button>
			<?php
			  if(!$PC){
			  ?>
			  <br>
			  <?php
			 }
			  ?>
			<button class="btn btn-xs btn-secondary" onclick="location='APP.php?my=1&yz=1'">我的优质应用</button>
			</th>
  
                    </tr>
                  </thead>
                  <form method='get' action='APP.php'>
                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myLargeModalLabel">请输入您要查找的应用</h4>
                      </div>
                      <div class="modal-body">
                      <input class="form-control" type="text" id="example-text-input" name="example-text-input" placeholder="应用查找">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button class="btn btn-primary" name='fl' value="<?php echo $_GET['fl'];?>">查找</button>
                      </div>
                    </div>
                  </div>
                </div>
                  </form>
				  
                  <tbody>


<?php   



include_once("../butian.php");
include_once("../hanshu.php");
$yhid=$_SESSION["id"];
$my=$_GET["my"];
$yz=$_GET["yz"];
$zyxt=fansql2ss($_GET["example-text-input"]);	

$ys=0;
if($_GET['yeshu']!=""){$ys=$_GET['yeshu'];}
$qian=$ys*20;
$jilujishuqi=0;

$zyxt1=HSmhcx($zyxt);
if($_SESSION['quanxian']==2){
	$yhwj="select id,name,url,time,yonghu,youxiu,shenhe from app where name like '$zyxt1'";
	}else{
		$yhwj="select id,name,url,time,yonghu,youxiu,shenhe from app where shenhe=1 and name like '$zyxt1'";
	}
if($yhid!=""&&$my==1){
	$yhwj=$yhwj." and yonghu=$yhid";
}
if($yz==1){
	$yhwj=$yhwj." and youxiu=1";
}

$yhwj=$yhwj." ORDER BY youxiu DESC limit $qian,20;";

$zhixing1=mysqli_query($lj,$yhwj);
		while($row=mysqli_fetch_array($zhixing1)){
			$jilujishuqi=$jilujishuqi+1;
			$yhyyid=$row['id']."+".encrypt(md5($row['id'].$row['url']), $key);
			
			
?>

<tr>
                      <td><?php echo HSsubstr_cut($row['name']);?></td>
					  <td><?php echo $row['time'];?></td>
            
					  <td>
            <button class="btn btn-label btn-primary" onclick="window.parent.newct('<?php echo $row['url']."?changxiangid=".$yhyyid."&changxiangname=".$_SESSION["yonghuming"].".yunyingyongAPP";?>')"><label><i class="mdi mdi-eye-outline"></i></label> 打开应用</button>
			<button class="btn btn-label btn-primary" onclick="window.parent.newct('<?php echo $wz."/APP/dkwdwj.php?yydz=".$row['url']."&changxiangid=".$yhyyid."&changxiangname=".$_SESSION["yonghuming"].".yunyingyongAPP";?>')"><label><i class="mdi mdi-eye-outline"></i></label> 使用该应用打开我的文件</button>
			<?php
			if($PZwjll==1||$_SESSION['quanxian']==2||$_SESSION['quanxian']==1){
			?>
			
<?php
}
if($_SESSION['quanxian']==2&&$row['shenhe']==0){
?>	
<button class="btn btn-label btn-warning" onclick="location='shenhe.php?id=<?php echo $row['id'];?>'"><label><i class="mdi mdi-widgets"></i></label> 通过审核</button>
 <button class="btn btn-label btn-danger" onclick="location='scyy.php?id=<?php echo $row['id'];?>'"><label><i class="mdi mdi-delete-empty"></i></label> 删除应用</button>

<?php
if($row['youxiu']==1){
?>
	
<button class="btn btn-label btn-info" onclick="location='youxiu.php?id=<?php echo $row['id'];?>'"><label><i class="mdi mdi-close-outline"></i></label> 取消优质应用</button>
<?php	
}else{
	?>
	<button class="btn btn-label btn-info" onclick="location='youxiu.php?id=<?php echo $row['id'];?>'"><label><i class="mdi mdi-widgets"></i></label> 升为优质应用</button>
<?php
}
}else if($_SESSION['quanxian']==2&&$row['shenhe']==1){
?>
	
<button class="btn btn-label btn-warning" onclick="location='shenhe.php?id=<?php echo $row['id'];?>'"><label><i class="mdi mdi-close-outline"></i></label> 取消审核</button>
 <button class="btn btn-label btn-danger" onclick="location='scyy.php?id=<?php echo $row['id'];?>'"><label><i class="mdi mdi-delete-empty"></i></label> 删除应用</button>	
 
	
<?php	
if($row['youxiu']==1){
?>
	
<button class="btn btn-label btn-info" onclick="location='youxiu.php?id=<?php echo $row['id'];?>'"><label><i class="mdi mdi-close-outline"></i></label> 取消优质应用</button>
<?php	
}else{
	?>
	<button class="btn btn-label btn-info" onclick="location='youxiu.php?id=<?php echo $row['id'];?>'"><label><i class="mdi mdi-widgets"></i></label> 升为优质应用</button>
<?php
}




}
if($yhid==$row['yonghu']&&$_SESSION['quanxian']!=2&&$my==1){
	?>
	<button class="btn btn-label btn-danger" onclick="location='scyy.php?id=<?php echo $row['id'];?>'"><label><i class="mdi mdi-delete-empty"></i></label> 删除应用</button>
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
if($jilujishuqi==20){
?>
<button class="btn btn-secondary" style="width:100%" onclick="location='xs_zz.php?yeshu=<?php echo $_GET['yeshu']+1;?>&&example-text-input=<?php echo $zyxt;?>'">前往下一页</button>

	
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

