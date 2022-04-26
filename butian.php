<?php

include("peizhi.php");
header("Content-Type: text/html;charset=utf-8");
//常驻防护
//反SQL注入
if($BTfanSQL==1)
{
function fansql2($str)//第二代反sql注入防xss攻击引擎
{
    if (empty($str)) return false;
    $str = htmlspecialchars($str);
    $str = str_replace( '/', "BT", $str);
    $str = str_replace( '"', "BT", $str);
    $str = str_replace( '(', "BT", $str);
    $str = str_replace( ')', "BT", $str);
    $str = str_replace( 'CR', "BT", $str);
    $str = str_replace( 'ASCII', "BT", $str);
    $str = str_replace( 'ASCII 0x0d', "BT", $str);
    $str = str_replace( 'LF', "BT", $str);
    $str = str_replace( 'ASCII 0x0a', "BT", $str);
    $str = str_replace( ',', "BT", $str);
    //$str = str_replace( '%', "BT", $str);
    $str = str_replace( ';', "BT", $str);
    $str = str_replace( 'eval', "BT", $str);
    $str = str_replace( 'open', "BT", $str);
    $str = str_replace( 'sysopen', "BT", $str);
    $str = str_replace( 'system', "BT", $str);
    $str = str_replace( '$', "BT", $str);
    $str = str_replace( "'", "BT", $str);
    $str = str_replace( "'", "BT", $str);
    $str = str_replace( 'ASCII 0x08', "BT", $str);
    $str = str_replace( '"', "BT", $str);
    $str = str_replace( '"', "BT", $str);
    $str = str_replace("", "BT", $str);
    $str = str_replace("&gt", "BT", $str);
    $str = str_replace("&lt", "BT", $str);
    $str = str_replace("<SCRIPT>", "BT", $str);
    $str = str_replace("</SCRIPT>", "BT", $str);
    $str = str_replace("<script>", "BT", $str);
    $str = str_replace("</script>", "BT", $str);
    $str = str_replace("select","BT",$str);
    $str = str_replace("join","BT",$str);
    $str = str_replace("union","BT",$str);
    $str = str_replace("where","BT",$str);
    $str = str_replace("insert","BT",$str);
    $str = str_replace("delete","BT",$str);
    $str = str_replace("update","BT",$str);
    $str = str_replace("like","BT",$str);
    $str = str_replace("drop","BT",$str);
    $str = str_replace("DROP","BT",$str);
    $str = str_replace("create","BT",$str);
    $str = str_replace("modify","BT",$str);
    $str = str_replace("rename","BT",$str);
    $str = str_replace("alter","BT",$str);
    $str = str_replace("cas","BT",$str);
    $str = str_replace("&","BT",$str);
    $str = str_replace(">","BT",$str);
    $str = str_replace("<","BT",$str);
    $str = str_replace(" ",chr(32),$str);
    $str = str_replace(" ",chr(9),$str);
    $str = str_replace("    ",chr(9),$str);
    $str = str_replace("&",chr(34),$str);
    $str = str_replace("'",chr(39),$str);
    $str = str_replace("<br />",chr(13),$str);
    $str = str_replace("''","'",$str);
    $str = str_replace("css","'",$str);
    $str = str_replace("CSS","'",$str);
    $str = str_replace("<!--","BT",$str);
    $str = str_replace("convert","BT",$str);
    $str = str_replace("md5","BT",$str);
    $str = str_replace("passwd","BT",$str);
    $str = str_replace("password","BT",$str);
    $str = str_replace("../","BT",$str);
    $str = str_replace("./","BT",$str);
    $str = str_replace("Array","BT",$str);
    $str = str_replace("or 1='1'","BT",$str);
    $str = str_replace(";set|set&set;","BT",$str);
    $str = str_replace("`set|set&set`","BT",$str);
    $str = str_replace("--","BT",$str);
    $str = str_replace("OR","BT",$str);
    $str = str_replace('"',"BT",$str);
    $str = str_replace("*","BT",$str);
    $str = str_replace("-","BT",$str);
    $str = str_replace("+","BT",$str);
    $str = str_replace("/","BT",$str);
    $str = str_replace("=","BT",$str);
    $str = str_replace("'/","BT",$str);
    $str = str_replace("-- ","BT",$str);
    $str = str_replace(" -- ","BT",$str);
    $str = str_replace(" --","BT",$str);
    $str = str_replace("(","BT",$str);
    $str = str_replace(")","BT",$str);
    $str = str_replace("{","BT",$str);
    $str = str_replace("}","BT",$str);
    //$str = str_replace("-1","BT",$str);
    //$str = str_replace("1","BT",$str);
    $str = str_replace(".","BT",$str);
    $str = str_replace("response","BT",$str);
    $str = str_replace("write","BT",$str);
    $str = str_replace("|","BT",$str);
    $str = str_replace("`","BT",$str);
    $str = str_replace(";","BT",$str);
    $str = str_replace("etc","BT",$str);
    $str = str_replace("root","BT",$str);
    $str = str_replace("//","BT",$str);
    $str = str_replace("!=","BT",$str);
    $str = str_replace("$","BT",$str);
    $str = str_replace("&","BT",$str);
    $str = str_replace("&&","BT",$str);
    $str = str_replace("==","BT",$str);
    $str = str_replace("#","BT",$str);
    $str = str_replace("@","BT",$str);
    $str = str_replace("mailto:","BT",$str);
    $str = str_replace("CHAR","BT",$str);
    $str = str_replace("char","BT",$str);
    return $str;
}

function fansql2ss($str)//第二代反sql注入防xss攻击引擎搜索专用版
{
    if (empty($str)) return false;
    $str = htmlspecialchars($str);
    $str = str_replace( '/', "", $str);
    $str = str_replace( '"', "", $str);
    $str = str_replace( '(', "", $str);
    $str = str_replace( ')', "", $str);
    $str = str_replace( 'CR', "", $str);
    $str = str_replace( 'ASCII', "", $str);
    $str = str_replace( 'ASCII 0x0d', "", $str);
    $str = str_replace( 'LF', "", $str);
    $str = str_replace( 'ASCII 0x0a', "", $str);
    $str = str_replace( ',', "", $str);
    //$str = str_replace( '%', "", $str);
    $str = str_replace( ';', "", $str);
    $str = str_replace( 'eval', "", $str);
    $str = str_replace( 'open', "", $str);
    $str = str_replace( 'sysopen', "", $str);
    $str = str_replace( 'system', "", $str);
    $str = str_replace( '$', "", $str);
    $str = str_replace( "'", "", $str);
    $str = str_replace( "'", "", $str);
    $str = str_replace( 'ASCII 0x08', "", $str);
    $str = str_replace( '"', "", $str);
    $str = str_replace( '"', "", $str);
    $str = str_replace("", "", $str);
    $str = str_replace("&gt", "", $str);
    $str = str_replace("&lt", "", $str);
    $str = str_replace("<SCRIPT>", "", $str);
    $str = str_replace("</SCRIPT>", "", $str);
    $str = str_replace("<script>", "", $str);
    $str = str_replace("</script>", "", $str);
    $str = str_replace("select","",$str);
    $str = str_replace("join","",$str);
    $str = str_replace("union","",$str);
    $str = str_replace("where","",$str);
    $str = str_replace("insert","",$str);
    $str = str_replace("delete","",$str);
    $str = str_replace("update","",$str);
    $str = str_replace("like","",$str);
    $str = str_replace("drop","",$str);
    $str = str_replace("DROP","",$str);
    $str = str_replace("create","",$str);
    $str = str_replace("modify","",$str);
    $str = str_replace("rename","",$str);
    $str = str_replace("alter","",$str);
    $str = str_replace("cas","",$str);
    $str = str_replace("&","",$str);
    $str = str_replace(">","",$str);
    $str = str_replace("<","",$str);
    $str = str_replace(" ",chr(32),$str);
    $str = str_replace(" ",chr(9),$str);
    $str = str_replace("    ",chr(9),$str);
    $str = str_replace("&",chr(34),$str);
    $str = str_replace("'",chr(39),$str);
    $str = str_replace("<br />",chr(13),$str);
    $str = str_replace("''","'",$str);
    $str = str_replace("css","'",$str);
    $str = str_replace("CSS","'",$str);
    $str = str_replace("<!--","",$str);
    $str = str_replace("convert","",$str);
    $str = str_replace("md5","",$str);
    $str = str_replace("passwd","",$str);
    $str = str_replace("password","",$str);
    $str = str_replace("../","",$str);
    $str = str_replace("./","",$str);
    $str = str_replace("Array","",$str);
    $str = str_replace("or 1='1'","",$str);
    $str = str_replace(";set|set&set;","",$str);
    $str = str_replace("`set|set&set`","",$str);
    $str = str_replace("--","",$str);
    $str = str_replace("OR","",$str);
    $str = str_replace('"',"",$str);
    $str = str_replace("*","",$str);
    $str = str_replace("-","",$str);
    $str = str_replace("+","",$str);
    $str = str_replace("/","",$str);
    $str = str_replace("=","",$str);
    $str = str_replace("'/","",$str);
    $str = str_replace("-- ","",$str);
    $str = str_replace(" -- ","",$str);
    $str = str_replace(" --","",$str);
    $str = str_replace("(","",$str);
    $str = str_replace(")","",$str);
    $str = str_replace("{","",$str);
    $str = str_replace("}","",$str);
    //$str = str_replace("-1","",$str);
    //$str = str_replace("1","",$str);
    $str = str_replace(".","",$str);
    $str = str_replace("response","",$str);
    $str = str_replace("write","",$str);
    $str = str_replace("|","",$str);
    $str = str_replace("`","",$str);
    $str = str_replace(";","",$str);
    $str = str_replace("etc","",$str);
    $str = str_replace("root","",$str);
    $str = str_replace("//","",$str);
    $str = str_replace("!=","",$str);
    $str = str_replace("$","",$str);
    $str = str_replace("&","",$str);
    $str = str_replace("&&","",$str);
    $str = str_replace("==","",$str);
    $str = str_replace("#","",$str);
    $str = str_replace("@","",$str);
    $str = str_replace("mailto:","",$str);
    $str = str_replace("CHAR","",$str);
    $str = str_replace("char","",$str);
    return $str;
}
function fansql2url($str)//单反sql注入
{
    if (empty($str)) return false;
    $str = htmlspecialchars($str);
    $str = str_replace( "'", "", $str);
	$str = str_replace( '"', "", $str);
    return $str;
}


if($zh!=""){$zh =fansql2($zh);}
if($mm!=""){$mm =fansql2($mm);}
if($qrmm!=""){$qrmm=fansql2($qrmm);}
if($ymm!=""){$ymm =fansql2($ymm);}
}



if($BTjiami==1)
    {
    if($mm!=""){$mm = encrypt($mm,$key);}
    if($qrmm!=""){$qrmm = encrypt($qrmm,$key);}
    if($mm!=""){$mm = str_replace('"',"syhzy",$mm );$mm = str_replace("'","yhzy",$mm );$mm = str_replace(" ","kgzy",$mm );}
    if($qrmm!=""){$qrmm = str_replace('"',"syhzy",$qrmm );$qrmm = str_replace("'","yhzy",$qrmm );$qrmm = str_replace(" ","kgzy",$qrmm );}
    }








//反爬虫策略
if($BTfanpachong==1)
{
header("Content-Type: text/html;charset=utf-8");
$useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';   
$pd=preg_match('/python/',$useragent);    
if ($pd) {header("Location:404.html"); }
}
















//非常驻防护
//加密函数
function encrypt($data, $key)  {  
    $char="";
    $str="";
    $key    =   md5($key);  
    $x      =   0;  
    $len    =   strlen($data);  
    $l      =   strlen($key);  
    for ($i = 0; $i < $len; $i++) {  
        if ($x == $l) { $x = 0; }  
        $char .= $key[$x];  
        $x++;  
    }  
    for ($i = 0; $i < $len; $i++){  
        $str .= chr(ord($data[$i]) + (ord($char[$i])) % 256);  
    }  
    return base64_encode($str);  
}



function decrypt($data,$key)
{
    $key = md5($key);
    $x = 0;
    $data = base64_decode($data);
    $len = strlen($data);
    $l = strlen($key);
    $char = '';
    for ($i = 0; $i < $len; $i++) {
        if ($x == $l) {
            $x = 0;
        }
        $char .= substr($key, $x, 1);
        $x++;
    }
    $str = '';
    for ($i = 0; $i < $len; $i++) {
        if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1))) {
            $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
        } else {
            $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
        }
    }
    return $str;
}



//文件隐身衣+防盗链下载码生成
function wjysy($id)  {  
	$str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$len = strlen($str)-1;
	$randstr = ''; 
	for ($i=0;$i<10;$i++) {
		$num=mt_rand(0,$len);
		$randstr .= $str[$num];
	} 
    $ysy=(string)$id.$randstr;
	return $ysy;
}





//文件防火墙
function wjfhq($lx)  {  
    if($lx=="php"||$lx=="sql"||$lx=="js"||$lx=="html"||$lx=="htm"||$lx=="xhtml"||$lx=="java"||$lx=="css"||$lx=="asp"||$lx=="xml"||$lx=="bat"||$lx=="c"||$lx=="cpp"||$lx=="bas"||$lx=="prg"||$lx=="cmd"||$lx=="py"||$lx=="md")
	{
		$BTlx="txt";
	}else{
		$BTlx=$lx;
	}
	return $BTlx;
}
//反跨域文件删除
function BTfky($dir,$size){
	
			if(strstr($dir, '/')!== false||strlen($dir)!==128||is_numeric($size)==false)//一个md5长32四个长128
			{
				die();
			}
}


function BTcjml($dir){
	if (!file_exists($dir)){
		mkdir ($dir,0777,true);
		}
	
}
        
function BTscml($dir){

	if (file_exists($dir)){
		rmdir($dir);
		}	
}




//上级网址核对
function BTsjwzhd($wz){
	$sjwz=$_SERVER["HTTP_REFERER"];

	if(strpos($sjwz,$wz)!== false){return 1;}else{return 0;}
}




//连通性检测
function pingAddress($url) {
	$head = @get_headers($url);
    return is_array($head) ?  1 : 0;
}
 







?>
