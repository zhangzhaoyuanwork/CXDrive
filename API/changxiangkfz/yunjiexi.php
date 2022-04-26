<?php
header("Content-Type: text/html;charset=utf-8");
$n=$_GET["jiekou"];
$w=$_GET["url"];
if($n=="")
{
	echo "<script>alert('畅享云解析提醒您，未检测到接口(jiekou)参数！');window.close();</script>";
}
else{
if($w=="")
{
	echo "<script>alert('畅享云解析提醒您，未检测到视频地址(url)参数！');window.close();</script>";
}
else
{
include_once("../../peizhi.php");
switch($n)
{
	case 1:
	$n=$n1;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 2:
	$n=$n2;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 3:
	$n=$n3;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 4:
	$n=$n4;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 5:
	$n=$n5;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 6:
	$n=$n6;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 7:
	$n=$n7;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 8:
	$n=$n8;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 9:
	$n=$n9;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 10:
	$n=$n10;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 11:
	$n=$n11;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 12:
	$n=$n12;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 13:
	$n=$n13;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 14:
	$n=$n14;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 15:
	$n=$n15;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 16:
	$n=$n16;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 17:
	$n=$n17;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 18:
	$n=$n18;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 19:
	$n=$n19;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	case 20:
	$n=$n20;
	$lianjie=$n.$w;
	header("Location: $lianjie");
	break;
	default:
	echo "<script>alert('无该接口！'); history.go(-1);</script>";
	break;
}
}
}
?>
