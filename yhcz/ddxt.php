<?php 
session_start();
header("Content-Type: text/html;charset=utf-8");
include_once("../peizhi.php");
include("../butian.php");
		$yhid=$_SESSION["id"];
		$dlm=wjysy($yhid);
		$yhczsql2="update yonghu set dengluma='$dlm' where id='$yhid';";
		$yhcz3=mysqli_query($lj,$yhczsql2);

$ewm=$wz."/yhcz/dl_2.php?dlm=".$dlm;


		?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>多端协同</title>
	<link href="../yhcz/css/bootstrap.min.css" rel="stylesheet">
<link href="../yhcz/css/materialdesignicons.min.css" rel="stylesheet">
<link href="../yhcz/css/style.min.css" rel="stylesheet">
<script type="text/javascript" src="../yhcz/js/jquery.min.js"></script>
<script type="text/javascript" src="../yhcz/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../yhcz/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="../yhcz/js/main.min.js"></script>
<script type="text/javascript" src="../js/myjs/erweima.js"></script>


    <style type="text/css">
        body,span,input,button {
            margin: 0;
            padding: 0;
        }
        #file {
            display: block;
            margin: 20px 0 10px 60px;
        }
        #upload {
            margin-left: 60px;
        }
    </style>
</head>
<body>
	
	<div align="center">

	
	
	</br></br></br>
	<h2 style="position:relative; left:-50px;">扫码手机端登录</h2>
	<div id="qrcode" style="position:relative; left:-50px;"></div>
	<script type="text/javascript">
	    window.onload =function(){
	        // 生成二维码
	        var qrcode = new QRCode(document.getElementById("qrcode"), {
	            width : 210,//设置宽高
	            height : 210
	        });
	        qrcode.makeCode("<?php echo $ewm; ?>");
	       
	    }
	</script>

	</div>
</body>
</html>
