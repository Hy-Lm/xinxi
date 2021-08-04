<?php
include('./public.php');
	$name=$_POST['name'];
	$sex=$_POST['sex'];
	$age=$_POST['age'];
	$codes=$_POST['codes'];
	$tel=$_POST['tel'];
	$HomeAddress=$_POST['HomeAddress'];
	$newAddress=$_POST['newAddress'];
	$fatherName=$_POST['fatherName'];
	$fatherTel=$_POST['fatherTel'];
	$motherName=$_POST['motherName'];
	$motherTel=$_POST['motherTel'];
	$schooling=$_POST['schooling'];
	$enrollment=$_POST['enrollment'];
	$major=$_POST['major'];
	$majorTeacher=$_POST['majorTeacher'];
	$referrer=$_POST['referrer'];
	$remark=$_POST['remark'];
	// base64转换成图片
	$imgs=$_POST['img'];
	$imageName = "25220_".date("His",time())."_".rand(1111,9999).'.png';
	if (strstr($imgs,",")){
	  $imgs = explode(',',$imgs);
	$imgs = $imgs[1];
	}
	$path = "./images/".date("Ymd",time());
	if (!is_dir($path)){ //判断目录是否存在 不存在就创建
	  mkdir($path,0777,true);
	}
	$imageSrc= $path."/". $imageName; //图片名字
	$r = file_put_contents($imageSrc, base64_decode($imgs));//返回的是字节数
	$sql="insert into info (name,sex,age,codes,tel,HomeAddress,newAddress,fatherName,fatherTel,motherName,motherTel,schooling,enrollment,major,majorTeacher,referrer,remark,img) values ('$name','$sex','$age','$codes','$tel','$HomeAddress','$newAddress','$fatherName','$fatherTel','$motherName','$motherTel','$schooling','$enrollment','$major','$majorTeacher','$referrer','$remark','$imageSrc')";
	$res=$conn->query($sql);
	if($res){
		echo "ok";
	}else{
		echo 'no';
	}

?>