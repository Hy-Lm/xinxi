<?php
header("Access-Control-Allow-Origin:*");
$conn=new mysqli('localhost','root','x4AFdY3ki4f5rCJA','xinxiadmin');
    // $conn=new mysqli('localhost','root','','xinxi');
	     $conn->query('set names utf8');
	 	 header('Access-Control-Allow-Origin:*');
	 	 if (!function_exists('array_column')) {
	 	  function array_column($arr2, $column_key) {
	 	   $data = [];
	 	   foreach ($arr2 as $key => $value) {
	 	    $data[] = $value[$column_key];
	 	   }
	 	   return $data;
	 	  }
	 	 }
		 $URL="./xinxiPHP/";
	 	 // $URL="http://localhost/xinxiPHP/";
?>