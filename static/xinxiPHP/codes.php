<?php
// 所有学员信息
include('./public.php');
$tel=$_GET['codes'];//联系电话
$sql="select * from info where codes='$tel' ";
$res=$conn->query($sql);
$arr=[];
		while($row=$res->fetch_assoc()){
			$row['img']=$URL.$row['img'];
			$arr [] =$row;
		}
		echo json_encode($arr);
?>