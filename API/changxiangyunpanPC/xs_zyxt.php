<?php   
header("Content-Type: text/html;charset=utf-8");
include("../../butian.php");
include_once("../../peizhi.php");
include_once("../../hanshu.php");
$zyxt=fansql2($_POST["name"]);	
$zyxt=HSmhcx($zyxt);

		$qian=(int)$_POST['yeshu']*16;
		$yhwj="select id,wenjianming,wenjiandizhi,gongxiang,xiazaima1 from wenjian where gongxiang=1 and wenjianming like '$zyxt' limit $qian,16;";
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

