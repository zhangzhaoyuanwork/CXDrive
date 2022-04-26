<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
        $txzid = $_GET["txzid"];  	
		$yhid=$_SESSION["id"];
		include_once("../peizhi.php");

		$jsjid2=$_GET["txzid"]; 
		$cstxzccz="select tongxingzhengleibie,jinruma from jingshijie where id=$jsjid2;";
		$cstxzccz1=mysqli_query($lj,$cstxzccz);
			while($row=mysqli_fetch_array($cstxzccz1)){
				$tongxingzhengleibie=$row['tongxingzhengleibie'];
				$jinruma=$row['jinruma'];
			}
			if($tongxingzhengleibie=="创世通行证"){
				$de1="delete from jingshijie where jinruma='$jinruma';";
				$de2="delete from jingshijiefenxiang where jingshijieid=$jsjid2;";
				$zhixingde1=mysqli_query($lj,$de1);
				$zhixingde2=mysqli_query($lj,$de2);

			}else{
		$zhcz="delete from jingshijie where id='$txzid' and tongxingzheng=$yhid;";
		$zhixing1=mysqli_query($lj,$zhcz);
			}




		
		echo "<script>history.go(-1);</script>";
?>



