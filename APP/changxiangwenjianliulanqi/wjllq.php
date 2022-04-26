
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>畅享文件浏览器</title>
<link rel="shortcut icon"href="../img/logo.png">
<meta name="keywords" content="LightYear,畅享云盘">
<meta name="description" content="畅享云盘。">
<meta name="author" content="yinqi">
<link href="../../yhcz/css/bootstrap.min.css" rel="stylesheet">
<link href="../../yhcz/css/materialdesignicons.min.css" rel="stylesheet">
<link href="../../yhcz/css/style.min.css" rel="stylesheet">


<script type="text/javascript" src="../../yhcz/js/jquery.min.js"></script>
<script type="text/javascript" src="../../yhcz/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../yhcz/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="../../yhcz/js/main.min.js"></script>
<script type="text/javascript" src="../../js/myjs/erweima.js"></script>
<!--图表插件-->


<script type="text/javascript" src="../../js/PDF/pdfobject.min.js"></script>
<script type="text/javascript" src="../../js/Dplayer/DPlayer.min.js"></script>
<script type="text/javascript" src="../../js/Dplayer/hls.min.js"></script>
<script type="text/javascript" src="../../js/Dplayer/flv.min.js"></script>
<script type="text/javascript" src="../../js/Dplayer/dash.all.min.js"></script>
<script type="text/javascript" src="../../js/myjs/xjct.js"></script>
<script type="text/javascript" src="../../js/myjs/erweima.js"></script>
</head>
  
<body>

	
	

  <div id="wjll" style="width: 100%;height: 100%;">
	<?php
	if($_GET['src']==null){
		?>
		<div style="background:#00b4ff; height:100%; width:100%" align="center">
			<br><br>
		
					<h3>请输入要打开文件的链接</h3>
					<form action="wjllq.php" method="GET">				
					<input type="text" name="src" maxlength="10000">
					<button>
						确认
					</button>
					 <input type="reset" value="清空">
					<br>
					</form>
		</div>
		<?php
	}
	
	
	?>
	

  </div>

<script>
	
	/**
	* 根据变量名获取匹配值
	*/
	function getQueryString(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
	var r = window.location.search.substr(1).match(reg);
	if (r != null) return unescape(r[2]); return null;
	} 
	//调用

	
	
	
	var url=getQueryString('src');
	var leixing=url.substring(url.lastIndexOf(".")+1);
	
	if(leixing=='ppt'||leixing=='pptx'||leixing=='xls'||leixing=='xlsx'||leixing=='doc'||leixing=='docx'){
	var src="https://view.officeapps.live.com/op/embed.aspx?src="+url
	window.location.href=src;
	}else if(leixing=='jpg'||leixing=='png'||leixing=='gif'||leixing=='svg'){
		cthtml2='<img id="wjlltp" src="'+url+'" style="overflow: hidden;height:100%;width:100%;" loop="infinite"></img>';
		$('div').append(cthtml2);
	}else if(leixing=='txt'||leixing=='php'||leixing=='js'||leixing=='html'||leixing=='htm'||leixing=='xhtml'||leixing=='java'||leixing=='css'||leixing=='sql'||leixing=='xml'||leixing=='asp'||leixing=='bat'||leixing=='c'||leixing=='cpp'||leixing=='bas'||leixing=='prg'||leixing=='cmd'||leixing=='py'||leixing=='md'){
		var src=url
		window.location.href=src;
	}else if(leixing=='mp4'||leixing=='mp3'||leixing=='ogg'||leixing=='webm'){
		const dp = new DPlayer({
	    container: document.getElementById('wjll'),
	    video: {
	        url: url,
			
	    },
		screenshot:true,
		autoplay:true,
		hotkey:true,
		preload:'auto',
		mutex:false,
		playbackSpeed:[0.5,1,1.5,2],
	});
	}else if(leixing=='flv'){
		const dp = new DPlayer({
		    container: document.getElementById('wjll'),
		    video: {
		        url: url,
		        type: 'flv',
		    },
		    pluginOptions: {
		        flv: {
		            // refer to https://github.com/bilibili/flv.js/blob/master/docs/api.md#flvjscreateplayer
		            mediaDataSource: {
		                // mediaDataSource config
		            },
		            config: {
		                // config
		            },
		        },
		    },
			screenshot:true,
			autoplay:true,
			hotkey:true,
			preload:'auto',
			mutex:false,
			playbackSpeed:[0.5,1,1.5,2],
		});
		console.log(dp.plugins.flv); // flv 实例
		
	}else if(leixing=='m3u8'){
		const dp = new DPlayer({
		    container: document.getElementById('wjll'),
		    video: {
		        url: url,
		        type: 'hls',
		    },
		    pluginOptions: {
		        hls: {
		            // hls config
		        },
		    },
			screenshot:true,
			autoplay:true,
			hotkey:true,
			preload:'auto',
			mutex:false,
			playbackSpeed:[0.5,1,1.5,2],
		});
		console.log(dp.plugins.hls); // Hls 实例
		
	}else if(leixing=='mpd'){
		const dp = new DPlayer({
		    container: document.getElementById('wjll'),
		    video: {
		        url: url,
		        type: 'dash',
		    },
		    pluginOptions: {
		        dash: {
		            // dash config
		        },
		    },
			screenshot:true,
			autoplay:true,
			hotkey:true,
			preload:'auto',
			mutex:false,
			playbackSpeed:[0.5,1,1.5,2],
		});
		console.log(dp.plugins.dash); // Dash 实例
	}else if(leixing=='pdf'){
		PDFObject.embed(url, '#wjll');
		
	}else{
		var cthtml2='<div id="xsct'+ctid+'" style="overflow: hidden;height:100%;width:100%;background: rgb(233, 233, 233);" align="center">'+'非常抱歉，畅享云盘暂不支持浏览此类文件，我们正在努力适配中。'+'</div>';
		$('div').append(cthtml2);
	}
	
</script>

</body>
</html>

</script>