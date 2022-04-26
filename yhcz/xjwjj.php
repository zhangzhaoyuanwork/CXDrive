<?php


header("Content-Type: text/html;charset=utf-8");
session_start();
include_once("../peizhi.php");
            $yhid=$_SESSION["id"];
            $name=$_POST["example-text-input"];	
            $mulu=$_SESSION["mulu"];
            if($mulu==''){ 
                $xjwjj="insert into mulu(name,dangqianmulu,yonghu) values('$name',null,'$yhid');";
            }else{
                $xjwjj="insert into mulu(name,dangqianmulu,yonghu) values('$name','$mulu','$yhid');";
            }
            $zhixing2 = mysqli_query($lj,$xjwjj);
            echo '<script>window.history.back(-1);</script>';


?>
