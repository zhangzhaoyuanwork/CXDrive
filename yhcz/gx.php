<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
$wjid=$_GET["wjid"];
$wjlx=$_GET["wjlx"];
$gxlx=$_GET["gxlx"];
$yhid=$_SESSION["id"];


include_once("../peizhi.php");
if($wjlx==1&&$gxlx==1){
	$zt="select gongxiang from wenjian where id=$wjid and yonghu=$yhid;";
		$zhixing1=mysqli_query($lj,$zt);
		while($row=mysqli_fetch_array($zhixing1)){
			if($row['gongxiang']==0){
				$zhzc= "update wenjian set gongxiang=1 where id=$wjid and yonghu=$yhid;";
				$zhixing2 = mysqli_query($lj,$zhzc);
			}else{
				$zhzc1= "update wenjian set gongxiang=0 where id=$wjid and yonghu=$yhid;";
				$zhixing3 = mysqli_query($lj,$zhzc1);
			}
		}
}else if($wjlx==1&&$gxlx==2){
	$zt="select gongxiang2 from wenjian where id=$wjid and yonghu=$yhid;";
		$zhixing1=mysqli_query($lj,$zt);
		while($row=mysqli_fetch_array($zhixing1)){
			if($row['gongxiang2']==0){
				$zhzc= "update wenjian set gongxiang2=1 where id=$wjid and yonghu=$yhid;";
				$zhixing2 = mysqli_query($lj,$zhzc);
			}else{
				$zhzc1= "update wenjian set gongxiang2=0 where id=$wjid and yonghu=$yhid;";
				$zhixing3 = mysqli_query($lj,$zhzc1);
			}
		}
}else if($wjlx==2&&$gxlx==2){
	$zt="select gongxiang2 from mulu where id=$wjid and yonghu=$yhid;";
		$zhixing1=mysqli_query($lj,$zt);
		while($row=mysqli_fetch_array($zhixing1)){
			if($row['gongxiang2']==0){
				$zhzc= "update mulu set gongxiang2=1 where id=$wjid and yonghu=$yhid;";
				$zhixing2 = mysqli_query($lj,$zhzc);
			}else{
				$zhzc1= "update mulu set gongxiang2=0 where id=$wjid and yonghu=$yhid;";
				$zhixing3 = mysqli_query($lj,$zhzc1);
			}
		}
}else if($wjlx==2&&$gxlx==3){
	$jsjid2=$_GET["jsjid"];
	$cstxzccz="select jinruma from jingshijie where id=$jsjid2;";
	$cstxzccz1=mysqli_query($lj,$cstxzccz);
		while($row=mysqli_fetch_array($cstxzccz1)){
			$ssjrm=$row['jinruma'];
		}
		$cstxzccz="select id from jingshijie where jinruma='$ssjrm' and tongxingzhengleibie='创世通行证';";
		$cstxzccz1=mysqli_query($lj,$cstxzccz);
		while($row=mysqli_fetch_array($cstxzccz1)){
			$jsjid=$row['id'];
		}


	$zt="select id from jingshijiefenxiang where muluid=$wjid and jingshijieid=$jsjid;";
	$pdfx="";
	$zhixing1=mysqli_query($lj,$zt);
		while($row=mysqli_fetch_array($zhixing1)){
			$pdfx=$row['id'];
		}
		
			if($pdfx==""){
				$zhzc= "insert into jingshijiefenxiang(muluid,jingshijieid) values ($wjid,$jsjid);";
				$zhixing2 = mysqli_query($lj,$zhzc);
			}else{
				$zhzc1= "delete from jingshijiefenxiang where id = $pdfx;";
				$zhixing3 = mysqli_query($lj,$zhzc1);
			}
		
}else if($wjlx==1&&$gxlx==3){
	$jsjid2=$_GET["jsjid"];
	$cstxzccz="select jinruma from jingshijie where id=$jsjid2;";
	$cstxzccz1=mysqli_query($lj,$cstxzccz);
		while($row=mysqli_fetch_array($cstxzccz1)){
			$ssjrm=$row['jinruma'];
		}
		$cstxzccz="select id from jingshijie where jinruma='$ssjrm' and tongxingzhengleibie='创世通行证';";
		$cstxzccz1=mysqli_query($lj,$cstxzccz);
		while($row=mysqli_fetch_array($cstxzccz1)){
			$jsjid=$row['id'];
		}




	$zt="select id from jingshijiefenxiang where wenjianid=$wjid and jingshijieid=$jsjid;";
	$pdfx="";
	$zhixing1=mysqli_query($lj,$zt);
		while($row=mysqli_fetch_array($zhixing1)){
			$pdfx=$row['id'];
		}
		
			if($pdfx==""){
				$zhzc= "insert into jingshijiefenxiang(wenjianid,jingshijieid) values ($wjid,$jsjid);";
				$zhixing2 = mysqli_query($lj,$zhzc);
			}else{
				$zhzc1= "delete from jingshijiefenxiang where id = $pdfx;";
				$zhixing3 = mysqli_query($lj,$zhzc1);
			}
		
}





?>
<script> history.go(-1);</script>