<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
include_once("../peizhi.php");
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
<table class="table table-hover" style="overflow:hidden;">
                  <thead>
                    <tr>
                      <th>文件</th>
					  <th>文件类型</th>
					  <th>操作       
            

  
                    </tr>
                  </thead>
                
				  
                  <tbody>


<?php   



include_once("../butian.php");
include_once("../hanshu.php");


$fwdz=$_GET['yydz']."?changxiangid=".$_GET['changxiangid']."&changxiangname=".$_GET['changxiangname'];
$yhid=$_SESSION["id"];


$yhwj="select wenjianming,wenjiandizhi,wenjianleixing from wenjian where yonghu=$yhid";

$zhixing1=mysqli_query($lj,$yhwj);
		while($row=mysqli_fetch_array($zhixing1)){
			$jilujishuqi=$jilujishuqi+1;
?>

<tr>
                      <td><?php echo HSsubstr_cut($row['wenjianming']);?></td>
					  <td><?php echo HSsubstr_cut($row['wenjianleixing']);?></td>
            
					  <td>
            <button class="btn btn-label btn-primary" onclick="window.parent.newct('<?php echo $fwdz."&src=".$wz."/wjcz/".$row['wenjiandizhi'].".yunyingyongAPP";?>')"><label><i class="mdi mdi-eye-outline"></i></label> 打开文件</button>

</td></tr>

<?php
}
?>
</tbody>
</body>

