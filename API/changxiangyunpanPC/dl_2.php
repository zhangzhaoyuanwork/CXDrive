<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
        $zh = $_GET["zh"];  
        $mm = $_GET["mm"]; 
include("../../butian.php");
header("Location:../../yhcz/dl_2.php?zh=$zh&mm=$mm"); 
?>

