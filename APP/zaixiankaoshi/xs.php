<?php   
session_start();
header("Content-Type: text/html;charset=utf-8");
$yhid=$_SESSION["id"];
include_once("../../peizhi.php");
		$yhwj="select id,name,zongfen,shijian from shijuan where yonghuid=$yhid;";
		$zhixing1=mysqli_query($lj,$yhwj);
		while($row=mysqli_fetch_array($zhixing1)){
			echo "试卷名：";
            echo $row['name'];
            echo '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';
            echo "总分：";
            echo $row['zongfen'];
            echo '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';
            echo "创建时间：";
            echo $row['shijian'];
            echo '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';
            echo '</div><br>';
            echo '<a href="shitiluru_dx.php?shijuanid='.$row['id'].'&sjm='.$row['name'].'">试题录入</a>';
            echo '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';
            echo '<a href="shitixiugai.php">试题修改</a>';
            echo '&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;';
            echo '<a href="shitishanchu.php">试题删除</a>';     
			echo "<br><hr />";
		}
		
?>