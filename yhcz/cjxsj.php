<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
include_once("../butian.php");
        $jrm = fansql2($_GET["jrm"]);  
		$sjm = fansql2($_GET["sjm"]); 

		$yhid=$_SESSION["id"];
		include_once("../peizhi.php");

$cx="select id from jingshijie where jinruma='$jrm' and tongxingzheng=chuangshizheid and tongxingzhengleibie='创世通行证';";
		$cx1=mysqli_query($lj,$cx);
		$pdcxzt="";
		while($row=mysqli_fetch_array($cx1)){
			$pdcxzt=$row['id'];
		}
		if($pdcxzt==""){
			$zhcz="insert into jingshijie(id,name,jinruma,chuangshizheid,tongxingzheng,tongxingzhengleibie) select id+1,'$sjm','$jrm','$yhid','$yhid','创世通行证' from jingshijie order by id desc limit 1";
		
		$sjpd="";
		$cx2="select id from jingshijie order by id desc limit 1";
		$cx3=mysqli_query($lj,$cx2);
		while($row=mysqli_fetch_array($cx3)){
			$sjpd=$row['id'];
		}
		
		if($sjpd==""){$bdtxz="insert into jingshijie(id,tongxingzhengleibie) values (0,'保底通行证')";$bdtxz1=mysqli_query($lj,$bdtxz);}
		$zhixing1=mysqli_query($lj,$zhcz);
		
echo "<script> alert('创建成功！');history.go(-1);</script>";
		}else{
		echo "<script> alert('加入码已存在，请更换加入码！');history.go(-1);</script>";
		}
?>
