<?php
include('./public.php');
// $row=$_GET['row'];//以传递过来的图片路径
// $rows=json_decode($row, true);
// print_r($rows['name']);

$id=$_POST['id'];
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
$file=$_FILES['file'];//以传递过来的图片路径
	        	// echo $name.$file;
	        	    if(is_uploaded_file($file['tmp_name'])){//$file['tmp_name'] 临时路径
	        		$hou=substr($file['name'], strrpos($file['name'], '.')+1);
	        		$img=rand(10,1000).time().'.'.$hou;//在图片名称后加入时间戳，避免重名文件覆盖
	        		move_uploaded_file($file['tmp_name'], "images/".$img);
	        	}
if($img==null){
		echo "<script>alert('请输入录入图片信息');window.location.href='http://xinxi.hd512.com/#/updateXinxi'</script>";
}else{
	$sql="update info set name='$name',sex='$sex',age='$age',codes='$codes',tel='$tel',HomeAddress='$HomeAddress',newAddress='$newAddress',fatherName='$fatherName',fatherTel='$fatherTel',motherName='$motherName',motherTel='$motherTel',schooling='$schooling',enrollment='$enrollment',major='$major',majorTeacher='$majorTeacher',referrer='$referrer',remark='$remark',img='$img' where id='$id'";
	$res=$conn->query($sql);
	if($res){
		echo "<script>alert('修改成功');window.location.href='http://xinxi.hd512.com/#/updateXinxi'</script>";
	}else{
		echo "<script>alert('修改失败');window.location.href='http://xinxi.hd512.com/#/updateXinxi'</script>";
	}
}

?>