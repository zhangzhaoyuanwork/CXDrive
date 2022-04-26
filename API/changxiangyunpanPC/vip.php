<?php
header("Content-Type: text/html;charset=utf-8");
$n=$_GET["jiekou"];
$w=$_GET["lianjie"];
if($w=="")
{
	echo "<script>alert('畅享云解析提醒您，视频地址不能为空！');window.close();</script>";
}
else
{
include_once("../../peizhi.php");
switch($n)
{
	case 1:
	$n=$n1;
	break;
	case 2:
	$n=$n2;
	break;
	case 3:
	$n=$n3;
	break;
	case 4:
	$n=$n4;
	break;
	case 5:
	$n=$n5;
	break;
	case 6:
	$n=$n6;
	break;
	case 7:
	$n=$n7;
	break;
	case 8:
	$n=$n8;
	break;
	case 9:
	$n=$n9;
	break;
	case 10:
	$n=$n10;
	break;
	case 11:
	$n=$n11;
	break;
	case 12:
	$n=$n12;
	break;
	case 13:
	$n=$n13;
	break;
	case 14:
	$n=$n14;
	break;
	case 15:
	$n=$n15;
	break;
	break;
	case 16:
	$n=$n16;
	break;
	case 17:
	$n=$n17;
	break;
	case 18:
	$n=$n18;
	break;
	case 19:
	$n=$n19;
	break;
	case 20:
	$n=$n20;
	break;
	default:
	echo "<script>alert('无该接口！'); history.go(-1);</script>";
	break;
}
$lianjie=$n.$w;
header("Location: $lianjie");
}

?>
