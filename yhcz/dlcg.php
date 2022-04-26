<?php   
session_start();
$zzqx=$_SESSION['quanxian'];
header("Content-Type: text/html;charset=utf-8");
include_once("../hanshu.php");
$PC=HSpc();
if($_SESSION['id']==null){
	if($PC){Header("Location:../index.php");}else{Header("Location:../indexsj.html");}
	
}

?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>畅享云盘</title>
<link rel="shortcut icon"href="../img/logo.png">
<meta name="keywords" content="LightYear,畅享云盘">
<meta name="description" content="畅享云盘。">
<meta name="author" content="yinqi">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/materialdesignicons.min.css" rel="stylesheet">
<link href="css/style.min.css" rel="stylesheet">
<style type="text/css"> 
body,div,h2{margin:0;padding:0;}
</style>



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="js/main.min.js"></script>
<script type="text/javascript" src="../js/myjs/erweima.js"></script>
<!--图表插件-->

<script>
	
	
	

	
 function fullScreen()  
    {  
        var docElm = document.documentElement;  
        //W3C   
        if (docElm.requestFullscreen) {  
            docElm.requestFullscreen();  
        }  
            //FireFox   
        else if (docElm.mozRequestFullScreen) {  
            docElm.mozRequestFullScreen();  
        }  
            //Chrome等   
        else if (docElm.webkitRequestFullScreen) {  
            docElm.webkitRequestFullScreen();  
        }  
            //IE11   
        else if (docElm.msRequestFullscreen) {  
            docElm.msRequestFullscreen();  
        }  
    }  
  
    //退出全屏
    function exitFullScreen() {  
  
  
        if (document.exitFullscreen) {  
            document.exitFullscreen();  
        }  
        else if (document.mozCancelFullScreen) {  
            document.mozCancelFullScreen();  
        }  
        else if (document.webkitCancelFullScreen) {  
            document.webkitCancelFullScreen();  
        }  
        else if (document.msExitFullscreen) {  
            document.msExitFullscreen();  
        }  
    }  
</script>
<script type="text/javascript">
    $(document).ready(function(){

        var iframeHeight = function () {
            var _height = $(window).height() - 73;
            $('#content').height(_height);
        }
        window.onresize = iframeHeight;
        $(function () {
            iframeHeight();
        });

    });

</script>
<script type="text/javascript" src="../js/PDF/pdfobject.min.js"></script>
<script type="text/javascript" src="../js/Dplayer/DPlayer.min.js"></script>
<script type="text/javascript" src="../js/Dplayer/hls.min.js"></script>
<script type="text/javascript" src="../js/Dplayer/flv.min.js"></script>
<script type="text/javascript" src="../js/Dplayer/dash.all.min.js"></script>
<script type="text/javascript" src="../js/myjs/xjct.js"></script>
<script type="text/javascript" src="../js/myjs/erweima.js"></script>
</head>
  
<body style=" overflow-x:hidden; overflow-y:hidden;">
  
<div class="lyear-layout-web">
  <div class="lyear-layout-container">
    <!--左侧导航-->
    <aside class="lyear-layout-sidebar">
      
      <!-- logo -->
      <div id="logo" class="sidebar-header">
        <a href="dlcg.php"><img src="images/logo-sidebar.png" title="LightYear" alt="LightYear" /></a>
      </div>
      <div class="lyear-layout-sidebar-scroll"> 
        
        <nav class="sidebar-main">
          <ul class="nav nav-drawer">
            <li class="nav-item active"> <a href="xs.php"  target="xianshi"><i class="mdi mdi-home"></i> 我的主页</a> </li>
			
 
            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-folder-open"></i> 文件分类</a>
              <ul class="nav nav-subnav">
                <li> <a href="xs.php?fl=sp" target="xianshi">视频文件</a> </li>
                <li> <a href="xs.php?fl=yy" target="xianshi">音乐文件</a> </li>
                <li> <a href="xs.php?fl=tp"  target="xianshi">图片文件</a> </li>
                <li> <a href="xs.php?fl=wd"  target="xianshi">文档文件</a> </li>
				
                
              </ul>
            </li>

<?php
if($zzqx==2){
?>

            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-treasure-chest"></i> 站长工具箱</a>
              <ul class="nav nav-subnav">
                <li> <a href="xs_zz.php" target="xianshi">全部文件</a> </li>
                <li> <a href="xs_zz.php?fl=sp" target="xianshi">视频文件</a> </li>
                <li> <a href="xs_zz.php?fl=yy" target="xianshi">音乐文件</a> </li>
                <li> <a href="xs_zz.php?fl=tp" target="xianshi">图片文件</a> </li>
                <li> <a href="xs_zz.php?fl=wd" target="xianshi">文档文件</a> </li>
                <li> <a href="xs_zz.php?fl=zyz"target="xianshi">资源站管理</a> </li>
				<li> <a href="../APP/APP.php" target="xianshi">云应用管理</a> </li>
                <li> <a href="yhgl.php" target="xianshi">账号管理</a> </li>
                <li> <a href="yhwjgl.php" target="xianshi">用户文件</a> </li>
                
              </ul>
            </li>
<?php
}

if($zzqx==1||$zzqx==2){
?>			
			
            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-briefcase"></i> 管理员工具箱</a>
              <ul class="nav nav-subnav">
                <li> <a href="xs_gly.php?fl=zyz"target="xianshi">资源站管理</a> </li>
                <li> <a href="yhgl.php" target="xianshi">账号管理</a> </li>
              </ul>
            </li>

<?php
}
?>

            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-folder-plus"></i> 资源市场</a>
              <ul class="nav nav-subnav">
              <li> <a href="xs_jxsc.php"  target="xianshi">畅享镜像市场</a> </li>
                <li> <a href="jsj.php"  target="xianshi">镜世界</a> </li>
                
              </ul>
            </li>
            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)"><i class="mdi mdi-cube"></i> 资源站</a>
              <ul class="nav nav-subnav">
				<li> <a href="xs_zyz.php"  target="xianshi">资源站</a> </li>
        <li> <a href="xs_zyzwdgx.php"  target="xianshi">我的共享</a> </li>

              </ul>
            </li>
            <li class="nav-item active"> <a href="../wjcz/wjsc_1.php"  target="xianshi"><i class="mdi mdi-arrow-up-thick"></i> 文件上传</a> </li>
			<li class="nav-item active"> <a href="ddxt.php"  target="xianshi"><i class="mdi mdi-cellphone-link"></i> 多端协同</a> </li>
            <li class="nav-item active"> <a href="../wjcz/lxsc.php"  target="xianshi"><i class="mdi mdi-cloud-upload"></i> 离线上传</a> </li>
			<li class="nav-item active"> <a href="../APP/APP.php"  target="xianshi"><i class="mdi mdi-folder-google-drive"></i> 畅享云OS</a> </li>
          </ul>
        </nav>
		<div align="center" style="width: 100%;height: 150px;">
<div id="erweimaqu" align="center" style="width: 150px;height: 150px;">


	<script type="text/javascript">
		
		
		
		
		
		function erweimaxianshi(wz) {
		
			var divFloat = document.getElementById("erweimaqu");

	        // 生成二维码
	        var qrcode = new QRCode(document.getElementById("erweimaqu"), {
	            width : 150,//设置宽高
	            height : 150
	        });
	        qrcode.makeCode(wz);


}


		function erweimaxiaohui() {
		  var divFloat = document.getElementById("erweimaqu");
		  divFloat.innerHTML = "";

}



	</script>
		</div>
		</div>
		
		
		
		
      </div>
	  
	  
      
    </aside>
    <!--End 左侧导航-->
    
    <!--头部信息-->
    <header class="lyear-layout-header">
      
      <nav class="navbar navbar-default">
        <div class="topbar">
          
          <div class="topbar-left">
            <div class="lyear-aside-toggler">
              <span class="lyear-toggler-bar"></span>
              <span class="lyear-toggler-bar"></span>
              <span class="lyear-toggler-bar"></span>
            </div>
            <span class="navbar-page-title"> 隐藏菜单栏 </span>
          </div>
          
		  
	<div id="yunpanrongliang2" class="progress" style="background-color: #fff;margin-left:auto; width: 150px;text-align:right;height: 20px;">
		</div>
<div class="progress" style="margin-right:0; width: 100px;">
                  <div id="yunpanrongliang" class="progress-bar" role="progressbar" style="width: 0%;color: #0062CC;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">

                  </div>
                </div>





          <ul class="topbar-right">
            <li class="dropdown dropdown-profile">
              <a href="javascript:void(0)" data-toggle="dropdown">
                <img class="img-avatar img-avatar-48 m-r-10" src="images/users/avatar.jpg" alt="畅享云盘" />
                <span><?php echo $yhm; ?> <span class="caret"></span></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-right">
				<li> <a onclick="fullScreen();"><i class="mdi mdi-arrow-expand-all"></i> 沉浸式办公</a> </li>
				<li> <a onclick="exitFullScreen();"><i class="mdi mdi-arrow-collapse-all"></i> 退出沉浸式</a> </li>
                <li> <a href="yhgl.php?zhgl=1" target="xianshi"><i class="mdi mdi-lock-outline"></i> 账号管理</a> </li>
                <li class="divider"></li>
                <li> <a href="../index.php?TC=1"><i class="mdi mdi-logout-variant"></i> 退出登录</a> </li>
              </ul>
            </li>
           
          </ul>
          
        </div>
      </nav>

    </header>
    <!--End 头部信息-->
 
    <!--页面主要内容-->


 <img id="tppb" src="../img/tppb.png" style="position:absolute;width:100%!important; height:100%!important;z-index:-1 ">

      <iframe id="xs" onmouseup="sfiframe()" class="lyear-layout-content" src="xs.php" scrolling="yes" border="0" id="content" width="100%" frameBorder="0" height="90%" name="xianshi" style="position:absolute;z-index:0;"/>

</img>


    <!--End 页面主要内容-->
  </div>
</div>



</body>
</html>

</script>