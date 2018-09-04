<?php
	$host="localhost";
	$username="root";
	$password="";
	$database="pos_db";
	$con=mysqli_connect($host,$username,$password,$database);
	if(!$con){
		die("can not connect:".mysqli_error());
	}
	mysqli_select_db($con,$database);


	$_SESSION['con'] = $con;
?>