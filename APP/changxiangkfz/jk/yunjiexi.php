<?php   
include_once("../../../peizhi.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>

		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
		
	</head>
	<body>
	<h1>接口简介：本接口可以帮助开发者解析各大网站视频。</h1>
	<h1>调用接口：<?php echo "$wz"."/API/changxiangkfz/yunjiexi.php" ?></h1>
	<h1>参数传递方法：GET</h1>
	<h1>传递参数：jiekou,url</h1>
	<h1>参数简介：jiekou（接口）,url（视频链接）</h1>
	<h1>参数范围：0&lt;jiekou&lt;21,url合法</h1>
	<h1>返回值类型：页面。</h1>
	<h1>返回值：无返回值，参数正确跳转到返回解析成功页面，参数错误返回错误原因。</h1>
	<h1>接口正确调用实例：</h1>
	<p><?php echo "$wz"."/API/changxiangkfz/yunjiexi.php" ?>?jiekou=1&url=https://v.youku.com/v_show/id_XMzYwODA2MTIyOA==.html?spm=a2hcb.12675304.m_2561_c_8264.d_1&s=efbfbd7eefbfbd44efbf&scm=20140719.rcmd.2561.show_efbfbd7eefbfbd44efbf</p>
	
	<h1>接口错误调用实例：</h1>
	<p>无参调用：</p>
	<P><?php echo "$wz"."/API/changxiangkfz/yunjiexi.php" ?></p>
	<p>单参调用：</p>
	<P><?php echo "$wz"."/API/changxiangkfz/yunjiexi.php" ?>?jiekou=1</p>
	<P><?php echo "$wz"."/API/changxiangkfz/yunjiexi.php" ?>?url=…………</p>
	<p>参数超范围：</p>
	<P><?php echo "$wz"."/API/changxiangkfz/yunjiexi.php" ?>?jiekou=23&url=…………</p>
	</body>
</html>
