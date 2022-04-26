<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
include_once("../peizhi.php");
		$yhwj="select id,wenjianming,wenjiandizhi,gongxiang from wenjian where gongxiang=1;";
		$zhixing1=mysqli_query($lj,$yhwj);
		while($row=mysqli_fetch_array($zhixing1)){
			echo '<div style="height=20px;width=100px;">';
			echo $row['wenjianming'];
			echo '</div>';
			echo '<div style="height=20px;width=100px;">';
			$dizhi="../wjcz/".$row['wenjiandizhi'];
			echo '<a href="'.$dizhi.' "target="_blank">浏览</a>';
			echo '&ensp;&ensp;';
			echo '<a href="xiazai.php?dizhi='.$dizhi.'&&wenjianming='.$row['wenjianming'].'" target="_blank">下载</a>';

			echo '&ensp;&ensp;';
			
			echo '</div>';
			echo "<br><hr />";
			
		}
		
?>

