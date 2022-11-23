<?php
session_start();
include("dbcon.php");

if(isset($_GET['user'])){
	$id=$_GET['user'];
	$user=getUserById($id);
	if($user['user_type'] !== "admin"){
		disable_user($id);
		header('location:admin.php');
	}
	else{
		header('location:error_403.php');
	}		
}

?>