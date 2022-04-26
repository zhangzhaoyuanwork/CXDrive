<?php 
include_once("../peizhi.php");
function downfile($fileurl)
{
 ob_start(); 
 $name=strrchr($fileurl,"/");
 
 $filename=substr($name,1);
 $date=date("Ymd-H:i:m");
 header( "Content-type:  application/octet-stream "); 
 header( "Accept-Ranges:  bytes "); 
 header( "Content-Disposition:  attachment;  filename= $filename"); 
 $size=readfile($fileurl); 
 echo $size;
  header( "Accept-Length: " .$size);
}

      $cxurl="select id,wangzhi,yhid,time,zhuangtai from lxxz where zhuangtai=1;";
		   
			$zhixing1=mysqli_query($lj,$cxurl);
      $fanhui1=mysqli_num_rows($zhixing1);
      if(!$fanhui1){
        $cxurl="select id,wangzhi,yhid,time,zhuangtai from lxxz ORDER BY time;";  
        $zhixing2=mysqli_query($lj,$cxurl); 

        while($row = mysqli_fetch_array($zhixing2)){downfile($row['wangzhi']);break;}
      }
      
 $url="https://www.baidu.com/s?ie=UTF-8&wd=%E5%8D%B0%E8%B1%A1%E7%AC%94%E8%AE%B0";
?> 