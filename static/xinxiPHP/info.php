<?php
// 所有学员信息
include('./public.php');
$sql="select * from info";
$res=$conn->query($sql);
		$arr=[];
		while($row=$res->fetch_assoc()){
			$row['img']=$URL.$row['img'];
			$arr [] =$row;
		}
		echo json_encode($arr);
?>