<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
    ignore_user_abort(1); // 后台运行
    set_time_limit(0); // 取消脚本运行时间的超时上限
include("../butian.php");
include("../hanshu.php");
include_once("../peizhi.php");


function download($filename,$url){

if (file_exists($filename)) {

unlink($filename); //删除旧目录下的文件bai

}
$wjdownload=fopen($url, 'rd');
	    while (!feof($wjdownload)) {
	         $wjpd = fread($wjdownload, 1024);
			 file_put_contents($filename,$wjpd, FILE_APPEND);
	       }

fclose($wjdownload);
}




// 获取远程文件大小函数
function remote_filesize($url, $user = "", $pw = "")
{
    ob_start();
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
 
    if(!empty($user) && !empty($pw))
    {
        $headers = array('Authorization: Basic ' .  base64_encode("$user:$pw"));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
 
    $ok = curl_exec($ch);
    curl_close($ch);
    $head = ob_get_contents();
    ob_end_clean();
 
    $regex = '/Content-Length:\s([0-9].+?)\s/';
    $count = preg_match($regex, $head, $matches);
 
    return isset($matches[1]) ? $matches[1] ."字节" : "unknown";
	
	
}

echo "您已成功进入队列。";









CXCXJL:
$ckxgsj="select id,xiugaitime from lxxz where zhuangtai=1;";//防死锁
$ckxgsj1=mysqli_query($lj,$ckxgsj);
$ckxgsj2=mysqli_fetch_array($ckxgsj1);
$zxxgid=$ckxgsj2[0];
$zxxgtime=$ckxgsj2[1];
date_default_timezone_set('Asia/Shanghai');
$time = date('Y-m-d H:i:s');
$zero1=strtotime($zxxgtime); 
 $zero2=strtotime($time);  
 $tianshu=ceil(($zero2-$zero1)/86400); //60s*60min*24h
if($tianshu>$lxxzts){
	$scssjl="delete from lxxz where id=$zxxgid;";
	$scssjl1=mysqli_query($lj,$scssjl);
}





$jsjc="select id from lxxz where zhuangtai=0;";//检验还有没有等待下载的
$jsjc1=mysqli_query($lj,$jsjc);
$jsjc2=mysqli_fetch_array($jsjc1);
$pdjsjc=$jsjc2[0];
if($pdjsjc==""){die;}


$dljc="select id from lxxz where zhuangtai=1;";//检验队列是否有人下载中
$dljc1=mysqli_query($lj,$dljc);
$dljc2=mysqli_fetch_array($dljc1);
$dlyh=$dljc2[0];
if($dlyh!=""){die;}else{
	$ddjc="select id,wangzhi,name,yonghu from lxxz where zhuangtai=0 limit 1;";
	$ddjc1=mysqli_query($lj,$ddjc);
	$ddjc2=mysqli_fetch_array($ddjc1);
	$ddjlid=$ddjc2[0];
	$url=$ddjc2[1];//设置下载文件的url
	$filename=$ddjc2[2];//设置保存到服务器本地的文件名
	$yhid=$ddjc2[3];
	
	$gxzt="update lxxz set zhuangtai=1 where id=$ddjlid;";
	//$gxzt1=mysqli_query($lj,$gxzt);
}




$burst = 1048576;
if(strrchr($filename, '.')!=false){$wjlx=substr(strrchr($filename, '.'), 1);}else{$filename=$filename.".未知类型";$wjlx=substr(strrchr($filename, '.'), 1);}





$sizestr=remote_filesize($url);
$wjsize=(int)substr($sizestr,0,strpos($sizestr, '字节'));//获取文件大小

$handle = fopen($url, 'rd');

	$c=0;
	    while ($c!=2048) {
	         $wjpd .= fread($handle, 1024);
			  $c++;
	       }

$md51=md5($wjpd);//获取md51
fclose($handle);




$wjmc="select id,wenjiandizhi,wenjianming,wenjianleixing,wenjiandaxiao,yonghu,md51,md52,md53,md5 from wenjian where wenjiandaxiao='$wjsize' and md51='$md51';";
$wjmc1=mysqli_query($lj,$wjmc);
$wjmc2=mysqli_fetch_array($wjmc1);
$mcid=$wjmc2[0];
$mcwjdz=$wjmc2[1];
$mcwjm=$wjmc2[2];
$mcwjlx=$wjmc2[3];
$mcwjdx=$wjmc2[4];
$mcmd51=$wjmc2[5];
$mcmd52=$wjmc2[6];
$mcmd53=$wjmc2[7];
$mcmd54=$wjmc2[8];








if($mcid!=""){
	
	$zdid="select max(id) from wenjian;";
	$zhixing1=mysqli_query($lj,$zdid);
	$row=mysqli_fetch_array($zhixing1);
	$wjid=$row[0]+1;
	$xiazaima1=wjysy($wjid);
	$wjzc="insert into wenjian(id,wenjiandizhi,wenjianming,wenjianleixing,wenjiandaxiao,yonghu,md51,md52,md53,md5,xiazaima1)select '$wjid',wenjiandizhi,'$filename','$wjlx',wenjiandaxiao,'$yhid',md51,md52,md53,md5,'$xiazaima1' from wenjian where md51='$md51' and wenjiandaxiao='$wjsize' limit 1;";
	$zhixing2 = mysqli_query($lj,$wjzc);
	 HSwenjianfenlei($lj);
	 
	 $scjl="delete from lxxz where id=$ddjlid;";
	 $scjl1=mysqli_query($lj,$scjl);
	 HSwenjianfenlei($lj);
	 goto CXCXJL;

}else{

$BTlx=wjfhq($wjlx);

$BTwjm=wjysy("1").".".$BTlx;


download($BTwjm,$url);


$wjdq = fopen($BTwjm, 'rb');
$tmp_md51="md5md5md5md5md5md5md5md5md5md5md";
$tmp_md52="md5md5md5md5md5md5md5md5md5md5md";
$tmp_md53="md5md5md5md5md5md5md5md5md5md5md";
$tmp_md5="md5md5md5md5md5md5md5md5md5md5md";
$PD2=1;
$PD3=1;

$duanshu=intval($wjsize/2097152)+1;
$yushu=$wjsize-intval($wjsize/2097152);
$dangqiangduanshu=0;


while ($dangqiangduanshu<$duanshu) {
        
        $dangqiangduanshu++;
		
		$md5jisuan=0;
		
		
		$pianduanpd="";
		$c=0;
			    while ($c!=2048) {
			         $pianduanpd .= fread($wjdq, 1024);
					  $c++;
			       }
		
		
		
        if ($dangqiangduanshu<$duanshu) {
			$md5jisuan=0;
			if($dangqiangduanshu==1&&$md5jisuan==0){
			
			$tmp_md51=md5($pianduanpd);
			$md5jisuan=1;
			}
			if($dangqiangduanshu/$duanshu>=2/4&&$PD2==1&&$md5jisuan==0){
			$tmp_md52=md5($pianduanpd);
			$PD2=0;
			$md5jisuan=1;
			}

			if($dangqiangduanshu/$duanshu>=3/4&&$PD3==1&&$md5jisuan==0){
			$tmp_md53=md5($pianduanpd);
			$PD3=0;
			$md5jisuan=1;
			}
			
        }
        else {
			
			while(!feof($wjdq)){//循环读取，直至读取完整个文件
			$pianduanpd .= fread($wjdq, 2048);
			} 

			$tmp_md5=md5($pianduanpd);

			if($duanshu==1){$tmp_md51=$tmp_md5;}

        }
    };
$zdid="select max(id) from wenjian;";
$zhixing1=mysqli_query($lj,$zdid);
$row=mysqli_fetch_array($zhixing1);
$wjid=$row[0]+1;
$xiazaima1=wjysy($wjid);
$yswjm=wjysy($wjid);
$wjdz="linshi/wenjian/".$yswjm.".".$BTlx;

$wjzc="insert into wenjian(id,wenjiandizhi,wenjianming,wenjianleixing,wenjiandaxiao,yonghu,md51,md52,md53,md5,xiazaima1) values('$wjid','$wjdz','$filename','$wjlx','$wjsize','$yhid','$tmp_md51','$tmp_md52','$tmp_md53','$tmp_md5','$xiazaima1');";

$zhixing2 = mysqli_query($lj,$wjzc);

if (file_exists($BTwjm)) {


copy($BTwjm,$wjdz); //拷贝到新目录

unlink($BTwjm); //删除旧目录下的文件bai

}



}
$scjl="delete from lxxz where id=$ddjlid;";
$scjl1=mysqli_query($lj,$scjl);
HSwenjianfenlei($lj);
goto CXCXJL;

