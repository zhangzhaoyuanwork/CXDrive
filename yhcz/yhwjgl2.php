<?php   
session_start();
echo '<body bgcolor="LightSkyBlue">';
header("Content-Type: text/html;charset=utf-8");
$zh=$_SESSION['glyhwjid'];
include_once("../peizhi.php");
		$yhwj1="select id from yonghu where zhanghao='$zh';";

		$zhixing2=mysqli_query($lj,$yhwj1);
		while($row = mysqli_fetch_array($zhixing2)){
						 $id=$row['id'];
					}
			$yhwj="select id,wenjianming,wenjiandizhi,gongxiang,qun1,qun2,qun3,qun4 from wenjian where yonghu='$id';";	
		
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
			echo '<a href="sc.php?dizhi='.$dizhi.'&&wjid='.$row['id'].'">删除</a>';
			echo '&ensp;&ensp;';
			if($row['gongxiang']!=0){
				echo '<a href="gx.php?wjid='.$row['id'].'">取消共享文件</a>';
			}
			echo '&ensp;&ensp;';
			echo '</div>';
			echo "<br><hr />";
			
		}
	echo '</body>';	
?>

