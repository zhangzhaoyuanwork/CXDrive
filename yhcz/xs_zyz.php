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
			<button class="btn btn-xs btn-secondary" onclick="location='xs_zyz.php'">资源站首页</button>
            <button class="btn btn-xs btn-secondary" onclick="goBack('<?php echo $wz;?>')"><</button>
            <button id="xiayiye" class="btn btn-xs btn-secondary" onclick="location='xs_zyz.php?yeshu=<?php echo $_GET['yeshu']+1;?>&&example-text-input=<?php echo $zyxt;?>'">></button>
            <button class="btn btn-xs btn-secondary" data-toggle="modal" data-target=".bs-example-modal-lg"">资源嗅探</button>
            </th>
                    </tr>
                  </thead>
                  <form name='xj' method='get' action='xs_zyz.php'>
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
                        <button class="btn btn-primary" name='xj'>嗅探</button>
                      </div>
                    </div>
                  </div>
                </div>
                  </form>
                  <tbody>


<?php   

include_once("../butian.php");

$yhid=$_SESSION["id"];
$zyxt=fansql2($_GET["example-text-input"]);	



$ys=0;
if($_GET['yeshu']!=""){$ys=$_GET['yeshu'];}
$qian=$ys*20;
$jilujishuqi=0;

$zyxt=HSmhcx($zyxt);
$yhwj="select id,wenjianming,wenjianleixing,wenjiandizhi,wenjiandaxiao,gongxiang,xiazaima1 from wenjian where gongxiang=1 and wenjianming like '$zyxt' limit $qian,20;";

$zhixing1=mysqli_query($lj,$yhwj);
		while($row=mysqli_fetch_array($zhixing1)){
			$jilujishuqi=$jilujishuqi+1;
?>

<tr>
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
            <button class="btn btn-label btn-purple" onclick="location='bc_zyz.php?&wjid=<?php echo $row['id'];?>'"><label><i class="mdi mdi-content-copy"></i></label>保存到我的云盘</button>

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
<button class="btn btn-secondary" style="width:100%" onclick="location='xs_zyz.php?yeshu=<?php echo $_GET['yeshu']+1;?>&&example-text-input=<?php echo $zyxt;?>'">前往下一页</button>
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
