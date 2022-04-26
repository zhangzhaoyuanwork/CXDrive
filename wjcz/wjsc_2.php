<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
$yhid=$_SESSION["id"];
include("../butian.php");
include("../hanshu.php");
include_once("../peizhi.php");
$id=0;
$md5=$_GET['md5'];
$md51=$_GET['md51'];
$md52=$_GET['md52'];
$md53=$_GET['md53'];
$wjm=$_GET['name'];
$wjdx=$_GET['size'];
$allmd5=$md5.$md51.$md52.$md53;
BTfky($allmd5,$wjdx);
$allmd5=$allmd5.$wjdx;

$lx=substr(strrchr($wjm, '.'), 1);
$BTlx=wjfhq($lx);


$wjmc="select id,wenjiandizhi,wenjianming,wenjianleixing,wenjiandaxiao from wenjian where wenjiandaxiao='$wjdx' and md5='$md5' and md51='$md51' and md52='$md52' and md53='$md53';";
$wjmc1=mysqli_query($lj,$wjmc);
$wjmc2=mysqli_fetch_array($wjmc1);
$mcid=$wjmc2[0];
$mcwjdz=$wjmc2[1];
$mcwjm=$wjmc2[2];
$mcwjlx=$wjmc2[3];
$mcwjdx=$wjmc2[4];




if ($_GET['act'] == 'upload'and$mcid==""){
	$dir = iconv("UTF-8", "GBK", "linshi/".$allmd5);
	BTcjml($dir);
    $index = $_POST['index'];
	$ddxc=iconv("UTF-8", "GBK", "linshi/".$allmd5."/".$index.".mp4");
	if (!file_exists($ddxc)){
			
    $filename = "linshi/".$allmd5."/".$index.".mp4";
    $result = move_uploaded_file($_FILES['data']['tmp_name'], $filename);
    if ($result) {
        echo json_encode(array('errno'=>200, 'message'=>'ok'));
    } else {
        echo json_encode(array('errno'=>1001, 'message'=>'上传失败'));
    }
	}else{
	echo json_encode(array('errno'=>200, 'message'=>'ok'));
	}
}elseif($_GET['act'] == 'upload'and$mcid!=""){
	echo json_encode(array('errno'=>200, 'message'=>'ok'));
	
	
}elseif($_GET['act'] == 'join'and$mcid!=""){ 
	$zdid="select max(id) from wenjian;";
	$zhixing1=mysqli_query($lj,$zdid);
	$row=mysqli_fetch_array($zhixing1);
	$id=$row[0]+1;
	$xiazaima1=wjysy($id);
	$wjzc="insert into wenjian(id,wenjiandizhi,wenjianming,wenjianleixing,wenjiandaxiao,yonghu,md5,md51,md52,md53,xiazaima1) values('$id','$mcwjdz','$wjm','$mcwjlx','$mcwjdx',$yhid,'$md5','$md51','$md52','$md53','$xiazaima1')";
	$zhixing2 = mysqli_query($lj,$wjzc);
	BTscml($dir);
	echo json_encode(array('errno'=>200, 'message'=>'上传成功'));
	HSwenjianfenlei($lj);
}elseif($_GET['act'] == 'join'and$mcid==""){ 
    $total = intval($_POST['total']);
	$zdid="select max(id) from wenjian;";
	$zhixing1=mysqli_query($lj,$zdid);
	$row=mysqli_fetch_array($zhixing1);
	$id=$row[0]+1;
	$ysyBT=wjysy($id);
	$xiazaima1=wjysy($id);
	ignore_user_abort(1); // 后台运行
	set_time_limit(0); // 取消脚本运行时间的超时上限
	$wjlj='linshi/wenjian/'.$ysyBT.'.'.$BTlx;
	$wjzc="insert into wenjian(id,wenjiandizhi,wenjianming,wenjianleixing,wenjiandaxiao,yonghu,md5,md51,md52,md53,xiazaima1) values('$id','$wjlj','$wjm','$lx','$wjdx',$yhid,'$md5','$md51','$md52','$md53','$xiazaima1')";
	
	$zhixing2 = mysqli_query($lj,$wjzc);
	
    for($i = 1; $i<=$total; $i++){
        file_put_contents($wjlj, file_get_contents("linshi/".$allmd5."/"."$i.mp4"), FILE_APPEND);
        @unlink("linshi/".$allmd5."/"."$i.mp4");
    }
	$dir = iconv("UTF-8", "GBK", "linshi/".$allmd5);
	BTscml($dir);
	
	
	
	
    echo json_encode(array('errno'=>200, 'message'=>'上传成功'));   
	 HSwenjianfenlei($lj);
	 die;
	 
}

