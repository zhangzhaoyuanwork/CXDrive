<?php
session_start();


if(isset($_COOKIE["changxiangzh"])&&isset($_COOKIE["changxiangmm"])&&$_GET["TC"]!=1){
	Header("Location:yhcz/dl_2.php");
}
if($_GET["TC"]==1){
	setcookie("changxiangzh", "", time()-3600,"/");
	setcookie("changxiangmm", "", time()-3600,"/");
	
	     /*** 删除所有的session变量..也可用unset($_SESSION[xxx])逐个删除。****/
	     $_SESSION = array();
	     /***删除sessin id.由于session默认是基于cookie的，所以使用setcookie删除包含session id的cookie.***/
	     if (isset($_COOKIE[session_name()])) {
	        setcookie(session_name(), '', time()-42000, '/');
	     }
	     // 最后彻底销毁session.
	     session_destroy();
}

include_once("hanshu.php");
$PC=HSpc();

if(!$PC&&$_GET["BB"]!="wzb"){Header("Location:indexsj.html");}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta content="yes" name="apple-mobile-web-app-capable">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>畅享云盘完整版</title>
<link rel="shortcut icon"href="img/logo.png">
<meta name="keywords" content="LightYear,畅享云盘">
<meta name="description" content="畅享云盘。">
<meta name="author" content="yinqi">
<link href="yhcz/css/bootstrap.min.css" rel="stylesheet">
<link href="yhcz/css/materialdesignicons.min.css" rel="stylesheet">
<link href="yhcz/css/style.min.css" rel="stylesheet">

<script type="text/javascript" src="yhcz/js/jquery.min.js"></script>
<script type="text/javascript" src="yhcz/js/bootstrap.min.js"></script>
<script type="text/javascript" src="yhcz/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="yhcz/js/main.min.js"></script>

<!--图表插件-->

</head>
<body background='img/bg.png'>
<div align="center">
<div style="height:70px;width:1000px;font-size: 0%;" align="left">
   <a href=""><img src="img/logo.png" style="height:70px;width:100px; "></img></a>
   <a href=""><img src="img/logo_mingzi.png" style="height:70px;width:900px;"></img></a>
</div>
<div style="background:#4682B4;height:50px;width:1000px;" align="left">

<div align="center" style="width:330px;height:20px;float:left;margin-top:15px">
   <a href="index.php">首页</a>&emsp;
   <a href="yhcz/xs_zyz.php" target="_blank">畅享资源库</a>&emsp;
	 <a href="APP/qbcp.html">全部产品</a>&emsp;
   </div>
   
 
   <div align="center" style="width:190px;height:20px;float:right;margin-top:15px">
   完整版/<a href="2.html"><b>精简版</b></a>/<a href="indexsj.html"><b>手机版</b></a>
   </div>

</div>



<div align="right" style="height:500px;background:url(img/ltby.jpg);width:1000px;">




<div align="center" style="height:500px;width:750px;float:left;">
<br><br>
<h1>天下武功，唯快不破！</h1><br><br>
<h2 style="color:#B0C4DE">您还在为用户抱怨下载慢发愁吗</h2><br><br>
<h4>来这里，下载无限制，无验证码，畅快淋漓尽致！</h4>
</div>
<div  align="center" style="height:500px;background:#87CEFA;width:250px;hight:500px">
<div  align="center" style="background:	#87CEFA;width:250px;height:115px;">
</div><br><br><br><br>
<div class="denglu"  align="left" style="center-right;	#F0F8FFwidth:250px;height:270px;">
<form name='denglu' method='post' action='yhcz/dl_2.php'>
账号<input type="text" name="zh"></input></br>
密码<input type="password" name="mm"></input></br>
<div align="center">
<button name='denglu'>登录</button>
 <input type="button" onclick="window.location.href='yhcz/zc_1.html'" value="注册">
</div>
</form>
</div>
</div>
</div>





<div align="left" style="height:800px;background:#00BFFF;width:1000px">
<img src="img/ys.png"></img>
<div align="center" style="width:600px;height:800px;float:right">

<div align="center" style="width:600px;height:212px;float:right">
<h1>体验真正的云加速</h1>
<div align="left">
<p>在畅享云盘，所有云存储、文件下载都是秒级响应，无任何限速。采用局域网存储分发技术。可在局域网中，享受到最快的下载速度。搭建私人云盘的用户，进行内网穿透后依旧可以满网速下载</p>
</div></div>

<div align="center" style="width:600px;height:320px;float:right">
<h1>我们的优势...</h1>
<div align="left">
<p>跨平台搭建服务器，你的服务器端可以是，Windos，Linux，Unix，mac甚至可以是Android，Iphone。大大降低了服务器搭建门槛。同样你的客户端可以是任何能浏览网页的系统，我们给了网页和APP一样的权限与速度。我们相信好软件不用推广。</p>
</div></div>

<<div align="center" style="width:600px;height:266px;float:right">
<h1>我不是开发人员怎么办？</h1>
<div align="left">
<p>在畅享云盘，我们赋予了站长基本上全可视化后台操作。您只需在网页登录超级账户，即可通过可视化页面进行管理页面。全傻瓜式操作，使每个人都能实现自己的站长梦。管理不过来您还可以任命管理员来帮您管理！</p>
</div></div>

</div>
</div>
</div>
</body>
</html>