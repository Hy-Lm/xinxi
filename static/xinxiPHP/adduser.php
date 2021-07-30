<?php
include('./public.php');
$name=$_GET['name'];
$pass=$_GET['pass'];
$sql="insert into admin (name,pass) values('$name','$pass')";
$res=$conn->query($sql);
if($res){
	echo 'ok';
}else{
	echo 'no';
}
?>