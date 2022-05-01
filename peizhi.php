<?php
header("Content-Type: text/html;charset=utf-8");
//主域名配置
//$wz="http://changxiang.cn.utools.club";
$wz="http://changxiang";





//普通配置
$lxxzts=3;//离线下载防死锁天数配置

//畅享文件浏览器配置
$PZwjll=0;











//补天引擎配置(1为开启其他数字均为关闭)
$BTfanSQL=1;//反SQL注入开关

$BTfanpachong=0;//反爬虫开关

$BTjiami=1;//加密开关
$key="1234";//加密密钥

$BTfdl=1;//防盗链开关
$BTfdlpl=100;//防盗链下载码发放频率，多少次切换一次下载码有同频率的下载码缓冲区，不建议过低过低影响用户体验，过高起不到防盗链作用。访问人数少的活建议5~20，中等访问人数60~100,访问人数多的话200~300足够。












//数据库配置
$localhost="localhost";
$batauser="changxiang";
$batapassword="changxiang";
$bataname="changxiang";
$lj=mysqli_connect($localhost,$batauser,$batapassword,$bataname);
mysqli_query($lj, "set names utf8"); 
if (!$lj)
{
    echo "服务器连接错误";
}



//解析接口配置
$n1="https://v.7cyd.com/vip/?url=";
$n2="https://api.sigujx.com/?url=";
$n3="http://jiexi.380k.com/?url=";
$n4="https://api.927jx.com/vip/?url=";
$n5="https://jqaaa.com/jx.php?url=";
$n6="https://www.h8jx.com/jiexi.php?url=";
$n7="https://jx.000180.top/jx/?url=";
$n8="http://jx.drgxj.com/?url=";
$n9="http://jx.618ge.com/?url=";
$n10="https://vip.mpos.ren/v/?url=";
$n11="http://vip.jlsprh.com/?url=";
$n12="https://api.lhh.la/vip/?url=";
$n13="https://jx.du2.cc/?url=";
$n14="https://jx.mw0.cc/?url=";
$n15="https://jx.km58.top/jx/?url=";
$n16="https://jx.ivito.cn/?url=";
$n17="https://jx.598110.com/index.php?url=";
$n18="https://yi29f.cn/vip.php?url=";
$n19="http://17kyun.com/api.php?url=";
$n20="https://17kyun.com/jx.php?url=";
?>
