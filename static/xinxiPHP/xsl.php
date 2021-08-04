<?php
error_reporting(E_ALL ^ E_DEPRECATED);
    // $localhost = '127.0.0.1';
    // $dbname = 'xinxi';
    // $dbuser = 'root';
    // $dbpwd = '';
    // $tbname = "info";
    ob_end_clean();
    header('Content-type: text/html; charset=utf-8');
    header("Content-type:application/vnd.ms-excel;charset=UTF-8"); 
    header("Content-Disposition:filename=excel.xls");// excel.xls为导出的数据表信息
 //    $conn = mysql_connect($localhost,$dbuser,$dbpwd) or die("连接数据库失败");
 //    mysql_select_db($dbname, $conn);
 //    mysql_query("set names 'UTF-8'");
	include('./public.php');
    $result='select * from info';
    echo "<table>";
    echo "<tr>";
    // echo "<th>ID</th>";//A1单元格
    echo "<th>姓名</th>";//B1单元格
	//C1单元格
    echo "<th>性别</th>";
	echo "<th>年龄</th>";
	echo "<th>身份证</th>";
	echo "<th>联系电话</th>";
	echo "<th>家庭住址</th>";
	echo "<th>现居地</th>";
	echo "<th>父亲姓名</th>";
	echo "<th>父亲电话</th>";
	echo "<th>母亲姓名</th>";
	echo "<th>母亲电话</th>";
	echo "<th>学制</th>";
	echo "<th>入学时间</th>";
	echo "<th>所学专业</th>";
	echo "<th>专业老师</th>";
	echo "<th>推荐人</th>";
	echo "<th>备注信息</th>";
    echo "</tr>";
    echo "</table>";
	$res=$conn->query($result);
    while($row=$res->fetch_array()){
        $data1 = $row["name"];
        $data2 = $row["sex"];
        $data3 = $row["age"];
		$data4 = $row["codes"];
		$data5 = $row["tel"];
		$data6 = $row["HomeAddress"];
		$data7 = $row["newAddress"];
		$data8 = $row["fatherName"];
		$data9 = $row["fatherTel"];
		$data10 = $row["motherName"];
		$data11 = $row["motherTel"];
		$data12 = $row["schooling"];
		$data13 = $row["enrollment"];
		$data14 = $row["major"];
		$data15 = $row["majorTeacher"];
		$data16 = $row["referrer"];
		$data17 = $row["remark"];
        //输出字段的数据到单元格
        //下面data改成你自己数据库对应的字段
        echo "<table>";
        echo "<tr>";
            echo "<td>$data1</td>";
            echo "<td>$data2</td>";
            echo "<td>$data3</td>";
			echo "<td>$data4</td>";
			echo "<td>$data5</td>";
			echo "<td>$data6</td>";
			echo "<td>$data7</td>";
			echo "<td>$data8</td>";
			echo "<td>$data9</td>";
			echo "<td>$data10</td>";
			echo "<td>$data11</td>";
			echo "<td>$data12</td>";
			echo "<td>$data13</td>";
			echo "<td>$data14</td>";
			echo "<td>$data15</td>";
			echo "<td>$data16</td>";
			echo "<td>$data17</td>";
        echo "</tr>";
        echo "</table>";
    }
?>