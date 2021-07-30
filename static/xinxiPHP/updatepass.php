<?php
include('./public.php');
$name=$_GET['name'];
$pass=$_GET['pass'];
$sql="update admin set pass='$pass' where name='$name'";
$res=$conn->query($sql);
if($res){
	echo 'ok';
}else{
	echo 'no';
}
?>