<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
$qunid=$_GET["qun"];
$yhid=$_SESSION["id"];
include_once("../peizhi.php");
		$yhwj="select id,wenjianming,wenjiandizhi,wenjianleixing,gongxiang from wenjian where (qun1=$qunid or qun2=$qunid or qun3=$qunid or qun4=$qunid);";
		$zhixing1=mysqli_query($lj,$yhwj);
		while($row=mysqli_fetch_array($zhixing1)){
				echo '<div style="height=20px;width=100px;">';
				echo $row['wenjianming'];
				echo '</div>';
				echo '<div style="height=20px;width=100px;">';
				$dizhi="../wjcz/".$row['wenjiandizhi'];
				echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="'.$dizhi.' "target="_blank">浏览</a>';
				echo '&ensp;&ensp;';
				echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="xiazai.php?dizhi='.$dizhi.'&&wenjianming='.$row['wenjianming'].'" target="_blank">下载</a>';
				echo '&ensp;&ensp;';
				
				echo '</div>';
				echo "<br><hr />";
			}
		
?>

