<?php   
header("Content-Type: text/html;charset=utf-8");
$wjid=$_GET["wjid"];
$qunid=$_GET["qunid"];
include_once("../peizhi.php");
		$zt="select wenjianming,qun1,qun2,qun3,qun4 from wenjian where id=$wjid;";
		$zhixing1=mysqli_query($lj,$zt);
		while($row=mysqli_fetch_array($zhixing1)){
			if($row['qun1']==$qunid||$row['qun2']==$qunid||$row['qun3']==$qunid||$row['qun4']==$qunid){
				echo "<script>alert('请勿重复共享！'); </script>";
			}else{
				if($row['qun1']==""){
				$zhzc1= "update wenjian set qun1='$qunid' where id='$wjid'";
				$zhixing3 = mysqli_query($lj,$zhzc1);
				}else{
					if($row['qun2']==""){
						$zhzc1= "update wenjian set qun1='$qunid' where id='$wjid'";
						$zhixing3 = mysqli_query($lj,$zhzc1);
					}else{
						if($row['qun3']==""){
							$zhzc1= "update wenjian set qun1='$qunid' where id='$wjid'";
							$zhixing3 = mysqli_query($lj,$zhzc1);
						}else{
							if($row['qun4']==""){
								$zhzc1= "update wenjian set qun1='$qunid' where id='$wjid'";
								$zhixing3 = mysqli_query($lj,$zhzc1);
							}else{
								
							}
							
						}
					}
				}
				
			}
		}
		
		?>
		<script> history.go(-1);</script>
		


