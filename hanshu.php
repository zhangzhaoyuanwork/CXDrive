<?php
header("Content-Type: text/html;charset=utf-8");
//通用模糊查询
function HSmhcx($str){
	$fanhuizhi=join('%', preg_split('//u', $str));
	return $fanhuizhi;
}


//通用文件大小计算
function HSdxjs($size) { 
    $units = array(' B', ' KB', ' MB', ' GB', ' TB'); 
    for ($i = 0; $size >= 1024 && $i < 4; $i++) {
        $size /= 1024;
    }
    return round($size, 2).$units[$i]; 
}

//通用文件夹大小遍历
 function HSbianli($lj,$wjjid){
						 $wjjdaxiao=0;
					     $cxxjmlid="select wenjiandaxiao from wenjian where dangqianmulu='$wjjid';";//查询文件大小
					     $cxxjmlid1=mysqli_query($lj,$cxxjmlid);
					     while($row=mysqli_fetch_array($cxxjmlid1)){
					 $wjjdaxiao=$wjjdaxiao+$row['wenjiandaxiao']; 
					     }
						 
						 $cxfzmlid="select id from mulu where dangqianmulu=$wjjid;";//查询目录id
						     $cxfzmlid1=mysqli_query($lj,$cxfzmlid);
						     while($row=mysqli_fetch_array($cxfzmlid1)){
						     $wjjid=$row['id'];
						     $wjjdaxiao=$wjjdaxiao+HSbianli($lj,$wjjid);
						 } 
						 
						 
					 	return $wjjdaxiao;
					 
					 
					 }
					 
					 
					 
					 
//文件分类 
function HSwenjianfenlei($lj){
	$arrsp = array('mp4','3gp','avi','mkv','wmv','mpg','vob','flv','swf','rmvb','xv');
	$arrtp = array('jpg','png','svg','ico','bmp','gif','tif','pcx','tga');
	$arrwd = array('txt','doc','docx','dot','dotx','wps','wpt','ppt','pptx','pot','potx','pps','dps','dpt','xls','xlt','xlsx','xltx','et','ett','php','js','java');
	$arryy = array('mp3','wma','flac','aac','mmf','amr','m4r','ogg','mp2','wav');
	$wjfl="select id,wenjianleixing,wenjiandaxiao from wenjian where wenjianfenlei is null;";
	$wjfl1=mysqli_query($lj,$wjfl);
	while($row=mysqli_fetch_array($wjfl1)){
		$flwjid=$row['id'];
	if(in_array($row['wenjianleixing'],$arrsp)){
		$gx="update wenjian set wenjianfenlei='sp' where id=$flwjid";
		$gx1=mysqli_query($lj,$gx);
		}else if(in_array($row['wenjianleixing'],$arrtp)){
			$gx="update wenjian set wenjianfenlei='tp' where id=$flwjid";
			$gx1=mysqli_query($lj,$gx);
		}else if(in_array($row['wenjianleixing'],$arrwd)){
			$gx="update wenjian set wenjianfenlei='wd' where id=$flwjid";
			$gx1=mysqli_query($lj,$gx);
		}else if(in_array($row['wenjianleixing'],$arryy)){
			$gx="update wenjian set wenjianfenlei='yy' where id=$flwjid";
			$gx1=mysqli_query($lj,$gx);
		}
	
	}
 }
 
 
 
 
 
 
 //平台检测
 function HSpc(){   
     $useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';   
     $useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:'';     
     function pd($substrs,$text){   
         foreach($substrs as $substr)   
             if(false!==strpos($text,$substr)){   
                 return true;   
             }   
             return false;   
     } 
     $mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ'); 
     $mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');   
                  
     $shidiannao=pd($mobile_os_list,$useragent_commentsblock) ||   
               pd($mobile_token_list,$useragent);   
                   
     if ($shidiannao){   
         return false;
     }else{   
           return true;    
     }   
 } 
 
 
 
 
 
 
 
 
 
 
 
 //长字符隐藏
function HSsubstr_cut($user_name){
    $strlen   = mb_strlen($user_name, 'utf-8');
    $firstStr   = ucfirst(strtolower(mb_substr($user_name, 0, 10, 'utf-8')));
    return $firstStr;
}
?>