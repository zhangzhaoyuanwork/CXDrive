<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
        $jrm = $_GET["jrm"];  	
		$yhid=$_SESSION["id"];
		include_once("../peizhi.php");
		$zhcz="insert into jingshijie(name,jinruma,chuangshizheid,tongxingzheng) select name,jinruma,chuangshizheid,'$yhid' from jingshijie where jinruma='$jrm' and tongxingzheng=chuangshizheid and tongxingzhengleibie='创世通行证';";
		$zhixing1=mysqli_query($lj,$zhcz);
		
		$cx="select id from jingshijie where jinruma='$jrm' and tongxingzheng=chuangshizheid and tongxingzhengleibie='创世通行证';";
		$cx1=mysqli_query($lj,$cx);
		$pdcxzt="";
		while($row=mysqli_fetch_array($cx1)){
			$pdcxzt=$row['id'];
		}
		if($pdcxzt==""){
			echo "<script> alert('没有找到此世界！');history.go(-1);</script>";
		}else{
		echo "<script> alert('加入成功！');history.go(-1);</script>";
		}
?>
