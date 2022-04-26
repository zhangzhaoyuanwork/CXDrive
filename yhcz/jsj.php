
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
</head>

<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
include_once("../peizhi.php");
include_once("../hanshu.php");

$PC=HSpc();
$yhid=$_SESSION["id"];
$czgzz="select id,name,tongxingzhengleibie from jingshijie where tongxingzheng=$yhid;";
$czgzz1=mysqli_query($lj,$czgzz);?>


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
						     <th>世界名</th>
						<?php
						  if($PC){
						  ?>
                 
					  <th>通行证级别</th>

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
					  <button class="btn btn-xs btn-secondary" onclick="location='jrjsj.html'">加入新世界</button>
					  <button class="btn btn-xs btn-secondary" onclick="location='cjxsj.html'">创建新世界</button>
					  </th>
					</tr>
</thead>	
<tbody>

 
<?php   
while($row=mysqli_fetch_array($czgzz1)){
?>

	                    <tr>
	                      <td><?php echo HSsubstr_cut($row['name']);?></td>
						  
						  <?php
						    if($PC){
						    ?>
						  <td><?php echo $row['tongxingzhengleibie'];?></td>
						    <?php
						   }
						    ?>

	                      <td>
							   <button class="btn btn-label btn-primary" onclick="location='xs_jsj.php?sjid=<?php echo $row['id'];?>'"><label><i class="mdi mdi-folder-open"></i></label>进入世界</button>
						       <button class="btn btn-label btn-danger" onclick="location='tcjsj.php?txzid=<?php echo $row['id'];?>'"><label><i class="mdi mdi-delete-empty"></i></label> 退出世界</button>
						  </td>
	                    </tr>
				
<?php 					
}
?>
</tbody>
</table>

