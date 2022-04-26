<?php


header("Content-Type: text/html;charset=utf-8");
			include("../peizhi.php");
			include("../butian.php");
			$xiazaima = $_GET['xiazaima'];
			$xiazaima2 = $xiazaima;
			$fdlcx="select id,wenjiandizhi,wenjianming,jishuqi,xiazaicishu,yonghu from wenjian where xiazaima1='$xiazaima' or xiazaima2='$xiazaima';";
			$fdlcx1=mysqli_query($lj,$fdlcx);
			$fdlcx2=mysqli_fetch_array($fdlcx1);
			$wjid=$fdlcx2[0];
			$wjdz ="../wjcz/".$fdlcx2[1];
			$wjm = $fdlcx2[2];
			$jsq = $fdlcx2[3];
			$xzcs = $fdlcx2[4];
			$yhid = $fdlcx2[5];
			if($BTfdl==1 and $jsq>=$BTfdlpl){
				$xxzm1=wjysy($yhid);
				$xzmgx="update wenjian set xiazaima1='$xxzm1',xiazaima2='$xiazaima',jishuqi=0 where id=$wjid";
				$zhixing1=mysqli_query($lj,$xzmgx);
			}
			$xzcsgx="update wenjian set jishuqi=jishuqi+1,xiazaicishu=xiazaicishu+1 where id=$wjid";
			$zhixing=mysqli_query($lj,$xzcsgx);
			
            set_time_limit(0);
            $filesize = filesize($wjdz);
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . $filesize);
            header('Content-Disposition: attachment; filename=' . $wjm);

            // 打开文件
            $fp = fopen($wjdz, 'rb');
            // 设置指针位置
            fseek($fp, 0);

            // 开启缓冲区
            ob_start();
            // 分段读取文件
            while (!feof($fp)) {
                $chunk_size = 1024*1028*20; // 20M
                echo fread($fp, $chunk_size);
                ob_flush(); // 刷新PHP缓冲区到Web服务器
                flush(); // 刷新Web服务器缓冲区到浏览器
            }
            // 关闭缓冲区
            ob_end_clean();

            fclose($fp);



?>
