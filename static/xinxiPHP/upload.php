<?php
include('./public.php');
// echo '1';
$row=$_GET['file'];//以传递过来的图片路径
$rows=json_decode($row, true);
// foreach($rows as $key=>$value){
     // print_r($rows);
// }
// $file=$_FILES['file'];//以传递过来的图片路径
// 	        	// echo $name.$file;
// 	        	    if(is_uploaded_file($file['tmp_name'])){//$file['tmp_name'] 临时路径
// 	        		$hou=substr($file['name'], strrpos($file['name'], '.')+1);
// 	        		$img=rand(10,1000).time().'.'.$hou;//在图片名称后加入时间戳，避免重名文件覆盖
// 	        		move_uploaded_file($file['tmp_name'], "images/".$img);
// 	        	}
?>