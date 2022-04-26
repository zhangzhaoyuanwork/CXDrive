<?php   
header("Content-Type: text/html;charset=utf-8");
$zh=$_POST["zh"];
$mm=$_POST["mm"];
include("../../butian.php");
include_once("../../peizhi.php");
		$yhwj3="select id from yonghu where zhanghao='$zh' and mima='$mm';";
		$zhixing3=mysqli_query($lj,$yhwj3);
		while($row=mysqli_fetch_array($zhixing3)){
			$yhid=$row['id'];
		}
		$qian=(int)$_POST['yeshu']*16;
		$yhwj="select id,wenjianming,wenjiandizhi,gongxiang,xiazaima1 from wenjian where yonghu=$yhid and wenjianfenlei='yy' limit $qian,16;";
		$zhixing1=mysqli_query($lj,$yhwj);
		while($row=mysqli_fetch_array($zhixing1)){
			echo '《';
			echo $row['id'];
			echo '》';
			echo '<div id="wjm" style="height=20px;width=100px;">';
			echo $row['wenjianming'];
			echo '</div>';
			echo '<div style="height=20px;width=100px;">';
			$dizhi=$wz."/yhcz/xiazai.php?xiazaima=".$row['xiazaima1'];
			echo '<a href="'.$dizhi.'" name="dizhi" "target="_blank">浏览</a>';
			echo '</div>';
			echo "<br><hr />";
			
		}
		
?>

