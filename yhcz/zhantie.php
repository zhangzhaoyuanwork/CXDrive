<?php


header("Content-Type: text/html;charset=utf-8");
session_start();
            $lx=$_SESSION["caozuolx"];
            $id=$_SESSION["caozuoid"];
            $cz=$_SESSION["caozuo"];
            $yhid=$_SESSION["id"];
            
            if($_SESSION["mulu"]!=''){$mulu=$_SESSION["mulu"];}else{$mulu='null';}

                include_once("../peizhi.php");  
                include_once("../butian.php");  
				
                if($lx=="wj"&&$cz=="f") {
                    $ysy=wjysy('');
                    $fzwj="insert into wenjian(wenjiandizhi,wenjianming,wenjianleixing,wenjianfenlei,wenjiandaxiao,yonghu,md5,md51,md52,md53,dangqianmulu)select wenjiandizhi,wenjianming,wenjianleixing,wenjianfenlei,wenjiandaxiao,'$yhid',md5,md51,md52,md53,$mulu from wenjian where id='$id' and yonghu='$yhid';";
                    $xzm1tj="update wenjian set xiazaima1=concat(id,'$ysy') where xiazaima1 is null;";
                    $fzwj1=mysqli_query($lj,$fzwj);
                    $xzm1tj1=mysqli_query($lj,$xzm1tj);
                    echo '<script>window.history.back(-1);</script>';
                }else if($lx=="wj"&&$cz=="y"){
                    $wjyd="update wenjian set dangqianmulu=$mulu where id='$id' and yonghu='$yhid';";
                    $wjyd1=mysqli_query($lj,$wjyd);
                    echo '<script>window.history.back(-1);</script>';
            
                
                }else if($lx=="wjj"&&$cz=="y"){
					$pdydmu=1;//判断移动目录是否在本目录中防止文件丢失
					function shangjibianli($id,$lj,$yhid,$mulu,&$pdydmu){
					$cxfzmlid="select id,dangqianmulu from mulu where yonghu='$yhid' and id=$mulu;";//遍历上级目录
					    $cxfzmlid1=mysqli_query($lj,$cxfzmlid);
					    while($row=mysqli_fetch_array($cxfzmlid1)){
							if($id==$row['id']){$pdydmu=0;return 0;}else if($id!=$row['id']&&$row['dangqianmulu']!=''){shangjibianli($id,$lj,$yhid,$row['dangqianmulu'],$pdydmu);}else if($id!=$row['id']&&$row['dangqianmulu']==''){$pdydmu=1;return 1;}
						
					} 
					}
					
					shangjibianli($id,$lj,$yhid,$mulu,$pdydmu);
					if($pdydmu==1){
                    $wjjyd="update mulu set dangqianmulu=$mulu where id='$id'and yonghu='$yhid';";
                    $wjjyd1=mysqli_query($lj,$wjjyd);
					}else{

						echo "<script>alert('您的请求已被拦截:目标文件是该文件的子文件');</script>";
					}
					echo '<script>window.history.back(-1);</script>';


                }else if($lx=="wjj"&&$cz=="f"){
					$pdydmu=1;//判断移动目录是否在本目录中防止文件丢失
					function shangjibianli($id,$lj,$yhid,$mulu,&$pdydmu){
					$cxfzmlid="select id,dangqianmulu from mulu where yonghu='$yhid' and id=$mulu;";//遍历上级目录
					    $cxfzmlid1=mysqli_query($lj,$cxfzmlid);
					    while($row=mysqli_fetch_array($cxfzmlid1)){
							if($id==$row['id']){$pdydmu=0;return 0;}else if($id!=$row['id']&&$row['dangqianmulu']!=''){shangjibianli($id,$lj,$yhid,$row['dangqianmulu'],$pdydmu);}else if($id!=$row['id']&&$row['dangqianmulu']==''){$pdydmu=1;return 1;}
						
					} 
					}
					
					shangjibianli($id,$lj,$yhid,$mulu,$pdydmu);
					if($pdydmu==1){
					
					function bianli($lj,$wjjid,$mulu){
                        $yhid=$_SESSION["id"];
                        $id=$_SESSION["caozuoid"];
                        $fzwjj="insert into mulu(name,dangqianmulu,yonghu,copy)select name,$mulu,yonghu,$wjjid from mulu where id='$wjjid' and yonghu='$yhid' and copy is null;";
                        $fzwjj1=mysqli_query($lj,$fzwjj);
                        $cxxjmlid="select id from mulu where copy=$wjjid and yonghu='$yhid';";
                        $cxxjmlid1=mysqli_query($lj,$cxxjmlid);
                        while($row=mysqli_fetch_array($cxxjmlid1)){//查询新建目录id
                            $mulu=$row['id'];

                            $cxfzwjid="select id from wenjian where dangqianmulu=$wjjid and yonghu='$yhid' and copy is null;";//查询要复制的文件id
                            $cxfzwjid1=mysqli_query($lj,$cxfzwjid);
                            while($row=mysqli_fetch_array($cxfzwjid1)){
                                $wjid=$row['id']; 
                                $ysy=wjysy('');
                                $fzwj="insert into wenjian(wenjiandizhi,wenjianming,wenjianleixing,wenjianfenlei,wenjiandaxiao,yonghu,md5,md51,md52,md53,dangqianmulu,copy)select wenjiandizhi,wenjianming,wenjianleixing,wenjianfenlei,wenjiandaxiao,'$yhid',md5,md51,md52,md53,$mulu,null from wenjian where id='$wjid' and yonghu='$yhid' and copy is null;";
                                $xzm1tj="update wenjian set xiazaima1=concat(id,'$ysy') where xiazaima1 is null;";
                                $fzwj1=mysqli_query($lj,$fzwj);
                                $xzm1tj1=mysqli_query($lj,$xzm1tj);
                            }


                           $cxfzmlid="select id from mulu where dangqianmulu=$wjjid and yonghu='$yhid' and copy is null;";//查询要复制的目录id
                            $cxfzmlid1=mysqli_query($lj,$cxfzmlid);
                            while($row=mysqli_fetch_array($cxfzmlid1)){
                            $wjjid=$row['id'];
                            bianli($lj,$wjjid,$mulu);
                        } 

                        }
						$cpxc="update mulu set copy=null where yonghu='$yhid';";
						 $cpxc1=mysqli_query($lj,$cpxc);
                    

                    }

                   bianli($lj,$id,$mulu);
					
					
					
					
					}else{
					
						echo "<script>alert('您的请求已被拦截:目标文件是该文件的子文件');</script>";
					}
					echo '<script>window.history.back(-1);</script>';
					
					
					
					
					
					
                    
                    

                }


			
?>
