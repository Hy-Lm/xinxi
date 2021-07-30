<?php
// 所有学员信息
include('./public.php');
$id=$_GET['id'];//联系电话
$sql="select * from info where id='$id'";
$res=$conn->query($sql);
$arr=[];
		while($row=$res->fetch_assoc()){
			$row['img']=$URL.$row['img'];
			$arr [] =$row;
		}
		echo json_encode($arr);
?>