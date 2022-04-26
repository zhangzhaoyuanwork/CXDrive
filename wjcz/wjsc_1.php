<?php 
session_start();
header("Content-Type: text/html;charset=utf-8");
include_once("../peizhi.php");
include("../butian.php");

if($_GET["dlm"]!=""){
    $dlm=$_GET["dlm"];
			$yhczsql="select zhanghao,mima from yonghu where dengluma='$dlm';";
			$yhcz1=mysqli_query($lj,$yhczsql);
			while($row = mysqli_fetch_array($yhcz1)){
				$zh=$row['zhanghao'];
				$mm=$row['mima'];
			}

}else if($_GET["zh"]!=""&&$_GET["mm"]!=""){
		$zh=$_GET["zh"];
		$mm=$_GET["mm"];
		
		
		$wjmc="select id from yonghu where zhanghao='$zh' and mima='$mm';";
		$wjmc1=mysqli_query($lj,$wjmc);
		while($row = mysqli_fetch_array($wjmc1)){
			 $_SESSION["id"]=$row['id'];
		}

}else{
	$zh=$_SESSION["zh"];
	$mm=$_SESSION["mm"];
}




$id="select id,yonghuming,shoujihao,quanxian,rongliang from yonghu where zhanghao='$zh' AND mima='$mm';";
$zhixing3=mysqli_query($lj,$id);
while($row = mysqli_fetch_array($zhixing3)){
     $_SESSION["id"]=$row['id'];
    $_SESSION["yonghuming"]=$row['yonghuming'];
    $_SESSION["shoujihao"]=$row['shoujihao'];
    $_SESSION["quanxian"]=$row['quanxian'];	
    $_SESSION["rongliang"]=$row['rongliang'];	
}

$_SESSION["zh"]=$zh;
$_SESSION["mm"]=$mm;
$_SESSION["mulu"]="";
$yhid=$_SESSION["id"];
$dlm=wjysy($yhid);
$yhczsql2="update yonghu set dengluma='$dlm' where id='$yhid';";
$yhcz3=mysqli_query($lj,$yhczsql2);
$ewm=$wz."/wjcz/wjsc_1.php?dlm=".$dlm;


if($_SESSION["id"]!=""){
	
	
	$yhid=$_SESSION["id"];
	
	
	
	$kongjian=0;
	
	$allyhwjdxjs="select wenjiandaxiao from wenjian where yonghu=$yhid;";
	
	$allyhwjdxjs1=mysqli_query($lj,$allyhwjdxjs);
									while($row=mysqli_fetch_array($allyhwjdxjs1)){
										$kongjian=$kongjian+$row['wenjiandaxiao'];	
									}	
	if($kongjian>$_SESSION["rongliang"]){echo "您已无空间！";die;}
	
	

	
	
		?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>畅享快传</title>
	<link href="../yhcz/css/bootstrap.min.css" rel="stylesheet">
<link href="../yhcz/css/materialdesignicons.min.css" rel="stylesheet">
<link href="../yhcz/css/style.min.css" rel="stylesheet">
<script type="text/javascript" src="../yhcz/js/jquery.min.js"></script>
<script type="text/javascript" src="../yhcz/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../yhcz/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="../yhcz/js/main.min.js"></script>

<!--图表插件-->
<script type="text/javascript" src="js/Chart.js"></script>
<script type="text/javascript" src="../js/myjs/erweima.js"></script>
	<script type="text/javascript" src="./js/spark-md5.js" ></script>
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
<h2 style="position:relative; left:-50px;">本设备上传</h2>
    <input type="file" id="file"/>

	
    <button id="upload" class="btn btn-success" style="position:relative; left:-100px;">上传</button>
    
	<div class="progress">
                  <span id="output" class="progress-bar progress-bar-striped active" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                  </span>
                </div>
	<div id="box"></div>
    <script src="./js/jquery-1.12.2.min.js"></script>
    <script src="./js/layer-2.2/layer.js"></script>
    <script>
	var tmp_md5="md5md5md5md5md5md5md5md5md5md5md";
	var tmp_md51=tmp_md5;
	var tmp_md52=tmp_md5;
	var tmp_md53=tmp_md5;
	var PD2=1;
	var PD3=1;
	
	
	function calculate(){
    var fileReader = new FileReader(),
        box=document.getElementById('box');
        blobSlice = File.prototype.mozSlice || File.prototype.webkitSlice || File.prototype.slice,
        file = document.getElementById("file").files[0],
		
        chunkSize = 2097152,
        //2MB
        chunks = Math.ceil(file.size / chunkSize),
        currentChunk = 0,
        spark = new SparkMD5();
		spark1 = new SparkMD5();
		spark2 = new SparkMD5();
		spark3 = new SparkMD5();
		box.innerText='扫描文件中，请稍后……';

    fileReader.onload = function(e) {
        
        currentChunk++;
		
		var md5jisuan=0;
		
        if (currentChunk < chunks) {
			md5jisuan=0;
			if(currentChunk==1&&md5jisuan==0){
			spark1.appendBinary(e.target.result); // append binary string
			tmp_md51=spark1.end();
			md5jisuan=1;
			}
			if(currentChunk/chunks>=2/4&&PD2==1&&md5jisuan==0){
				
			spark2.appendBinary(e.target.result); // append binary string
			tmp_md52=spark2.end();
			PD2=0;
			md5jisuan=1;
			}
			if(currentChunk/chunks>=3/4&&PD3==1&&md5jisuan==0){
				
			spark3.appendBinary(e.target.result); // append binary string
			tmp_md53=spark3.end();
			PD3=0;
			md5jisuan=1;
			}
			
			
            loadNext();
        }
        else {
			

			spark.appendBinary(e.target.result);
			tmp_md5=spark.end();
			if(chunks==1){tmp_md51=tmp_md5;}
			box.innerText='扫描文件完成，开始上传。';
            upload();
        }
    };

    function loadNext() {
        var start = currentChunk * chunkSize,
            end = start + chunkSize >= file.size ? file.size : start + chunkSize;

        fileReader.readAsBinaryString(blobSlice.call(file, start, end));
		
    };

    loadNext();
	
}

        function upload()
        {
            var file = $("#file")[0].files[0];                  // 文件对象
            if (file == undefined) {
                layer.msg('请先选择文件');
                return false;
            }
            $(this).addClass('disabled');
            var loading = layer.load(0, {shade: false});        // 0代表加载的风格，支持0-2
            
            var name = file.name;                               // 文件名
			var namestr = name.toString()
            var size = file.size;                               // 文件总大小
			var sizestr = size.toString()
            var succeed = 0;                                    // 请求成功次数
            var shardSize = 20971520;                           // 以20MB为一个分片
			if(size<209715200){shardSize=10485760;}				//小于200M以10M为一个分片
			if(size<52428800){shardSize=1048576;}					//小于50M以1M为一个分片
            var shardCount = Math.ceil(size / shardSize);       // 总片数
            for (var i = 0; i < shardCount; i++) {
                // 计算每一片数据的起始与结束位置
                var start = i * shardSize;
                var end = Math.min(size, start + shardSize);
                // 构造一个表单，FormData是HTML5新增的
                var form = new FormData();
                form.append("data", file.slice(start, end));    // slice方法用于切出文件的一部分
                form.append("name", name);
                form.append("total", shardCount);               // 总片数
                form.append("index", i + 1);                    // 当前是第几片
                // Ajax提交
                $.ajax({
                    url: "wjsc_2.php?act=upload&name="+namestr+"&size="+sizestr+"&md5="+tmp_md5+"&md51="+tmp_md51+"&md52="+tmp_md52+"&md53="+tmp_md53,
                    type: "POST",
                    data: form,
                    async: true,           // 异步
                    processData: false,    // 很重要，告诉jquery不要对form进行处理
                    contentType: false,    // 很重要，指定为false才能形成正确的Content-Type
                    success: function(data){
                        var returnData = $.parseJSON(data); 
                        if (returnData.errno == 200) {
                            ++succeed;
                            // console.log(succeed);
							var baifenshustr = Number(succeed/shardCount*100).toFixed(2);
							baifenshustr += "%";


                            $("#output").text(baifenshustr);
							$("#output").width(baifenshustr);
						
							
                            if (succeed == shardCount) {
							box.innerText='文件上传已完成，后台正在自动为您处理，该过程不占用您的网速且可关闭切换页面。';
                                $.ajax({
                                    url: "wjsc_2.php?act=join&name="+namestr+"&size="+sizestr+"&md5="+tmp_md5+"&md51="+tmp_md51+"&md52="+tmp_md52+"&md53="+tmp_md53,
                                    type: "POST",
                                    data: {total: shardCount},
                                    success: function(data){
                                        var returnData = $.parseJSON(data);
                                        if (data.errno == 200) {
                                            layer.open({content: '上传成功', time: 2});
                                            setTimeout(function(){
                                                $("#upload").removeClass('disabled');
                                            }, 2000);
                                        } else {
                                            layer.open({content: '上传失败', time: 2});
                                            setTimeout(function(){
                                                location.reload();
                                            }, 2000);
                                        }
                                    }
                                });
                            }
                        } else {
                            layer.open({content: '上传失败', time: 2});
                            setTimeout(function(){
                                location.reload();
                            }, 2000);
                        }
                    }
                });
            }
        }
        
        $("#upload").click(function(){
            if ($(this).hasClass('disabled')) {
                return false;
            } else {
			
				calculate();

            }
        });
    </script>
	
	</br></br></br>
	<h2 style="position:relative; left:-50px;">扫码跨设备传文件</h2>
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
<?php
}
?>