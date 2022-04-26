<?php


header("Content-Type: text/html;charset=utf-8");
session_start();
            $_SESSION["caozuolx"]=$_GET['lx'];
            $_SESSION["caozuoid"]=$_GET['id'];
            $_SESSION["caozuo"]=$_GET['cz'];
            echo "<script>history.go(-1);</script>"

			
?>
