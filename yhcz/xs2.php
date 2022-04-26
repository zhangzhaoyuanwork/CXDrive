<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
$yhid=$_SESSION["id"];
$qun1=$_SESSION["qun1"];
$qun2=$_SESSION["qun2"];
$qun3=$_SESSION["qun3"];
$qun4=$_SESSION["qun4"];
$name1=$_SESSION["name1"];
$name2=$_SESSION["name2"];
$name3=$_SESSION["name3"];
$name4=$_SESSION["name4"];
$mulu=$_SESSION["mulu"];
include_once("../peizhi.php");
if($mulu==""){$yhwj="select id,wenjianming,wenjiandizhi,gongxiang,xiazaima1,qun1,qun2,qun3,qun4 from wenjian where yonghu=$yhid and dangqianmulu is null;";
$mlcx="select id,name,dangqianmulu,yonghu,time from mulu where yonghu=$yhid and dangqianmulu is null;";
}else{
	$yhwj="select id,wenjianming,wenjiandizhi,gongxiang,xiazaima1,qun1,qun2,qun3,qun4 from wenjian where yonghu=$yhid and dangqianmulu='$mulu';";
	$mlcx="select id,name,dangqianmulu,yonghu,time from mulu where yonghu=$yhid and dangqianmulu='$mulu';";
}
$mlcx1=mysqli_query($lj,$mlcx);
while($row=mysqli_fetch_array($mlcx1)){

			
	echo '<div style="height=20px;width=100px;">';
			echo '';
			echo $row['name'];
			echo '</div>';
echo '<div style="height=20px;width=100px;">';
			$dizhi="../wjcz/".$row['wenjiandizhi'];
			echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="'.$dizhi.' "target="_blank">打开文件夹</a>';
			echo '&ensp;&ensp;';
			echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="xiazai.php?xiazaima='.$row['xiazaima1'].'" target="_blank">下载</a>';
			echo '&ensp;&ensp;';
			echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="sc.php?wjid='.$row['id'].'">删除文件夹</a>';
			echo '&ensp;&ensp;';
			echo '&ensp;&ensp;';
			
			
			echo '</div>';
			echo "<br><hr />";

}
		
		
		
		
		
		
		
		
		
		
		$zhixing1=mysqli_query($lj,$yhwj);
		while($row=mysqli_fetch_array($zhixing1)){
			echo '<div style="height=20px;width=100px;">';
			echo '';
			echo $row['wenjianming'];
			echo '</div>';
			echo '<div style="height=20px;width=100px;">';
			$dizhi="../wjcz/".$row['wenjiandizhi'];
			echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="'.$dizhi.' "target="_blank">浏览</a>';
			echo '&ensp;&ensp;';
			echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="xiazai.php?xiazaima='.$row['xiazaima1'].'" target="_blank">下载</a>';
			echo '&ensp;&ensp;';
			echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="sc.php?wjid='.$row['id'].'">删除</a>';
			echo '&ensp;&ensp;';
			if($row['gongxiang']==0){
				echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" style="width:100px;height:30px;display:block;float:left;background:blue;border-radius:10px;margin-right:10px;" href="gx.php?wjid='.$row['id'].'">全开放式共享</a>';
			}else{
				echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="gx.php?wjid='.$row['id'].'">取消共享文件</a>';
			}
			echo '&ensp;&ensp;';
	
			if($qun1!=""&&$qun1!=$row['qun1']&&$qun1!=$row['qun2']&&$qun1!=$row['qun3']&&$qun1!=$row['qun4'])
			{
				echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="qgx.php?wjid='.$row['id'].'&&qunid=1">分享到群'.$name1.'</a>';
				
			}
			if($qun1!=""&&($qun1==$row['qun1']||$qun1==$row['qun2']||$qun1==$row['qun3']||$qun1==$row['qun4']))
			{
				echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="qxqgx.php?wjid='.$row['id'].'&&qunid=1">取消分享'.$name1.'</a>';
		
			}
			echo '&ensp;&ensp;';
			
			
			
			if($qun2!=""&&$qun2!=$row['qun1']&&$qun2!=$row['qun2']&&$qun2!=$row['qun3']&&$qun2!=$row['qun4'])
			{
				echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="qgx.php?wjid='.$row['id'].'&&qunid=2">分享到群'.$name2.'$d</a>';
			
			}
			if($qun2!=""&&($qun2==$row['qun1']||$qun2==$row['qun2']||$qun2==$row['qun3']||$qun2==$row['qun4']))
			{
				echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="qxqgx.php?wjid='.$row['id'].'&&qunid=2">取消分享'.$name2.'</a>';
			
			}
			
			
			echo '&ensp;&ensp;';
			if($qun3!=""&&$qun3!=$row['qun1']&&$qun3!=$row['qun2']&&$qun3!=$row['qun3']&&$qun3!=$row['qun4'])
			{
				echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="qgx.php?wjid='.$row['id'].'&&qunid=3">分享到群'.$name3.'</a>';
				
			}
			if($qun3!=""&&($qun3==$row['qun1']||$qun3==$row['qun2']||$qun3==$row['qun3']||$qun3==$row['qun4']))
			{
				echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="qxqgx.php?wjid='.$row['id'].'&&qunid=3">取消分享'.$name3.'</a>';
			
			}
			
			
			
			
			echo '&ensp;&ensp;';
			if($qun4!=""&&$qun4!=$row['qun1']&&$qun4!=$row['qun2']&&$qun4!=$row['qun3']&&$qun4!=$row['qun4'])
			{
				 echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="qgx.php?wjid='.$row['id'].'&&qunid=4">分享到群'.$name4.'</a>';
				
			}
			if($qun4!=""&&($qun4==$row['qun1']||$qun4==$row['qun2']||$qun4==$row['qun3']||$qun4==$row['qun4']))
			{
				echo '<a style="width:100px;height:30px;display:block;float:left;background:Thistle;border-radius:10px;margin-right:10px;text-align:center;color:white;line-height:30px;text-decoration:none;" href="qxqgx.php?wjid='.$row['id'].'&&qunid=4">取消分享'.$name4.'</a>';
				
			}
			
			
			echo '&ensp;&ensp;';
			
			
			echo '</div>';
			echo "<br><hr />";
			
		}
		
?>

