<?php
include('./public.php');
$name=$_GET['name'];
$pass=$_GET['pass'];
$sql="select * from admin where name='$name'";
$res=$conn->query($sql);
if($res->num_rows<=0){
	echo 'ok';
}else{
	// echo 'no';
	$sql1="select * from admin where name='$name' and pass='$pass'";
	$res1=$conn->query($sql1);
	if($res1->num_rows>0){//账号密码正确
		echo 'nono';
	}else{
		echo 'kkk';
	}
}
	
?>