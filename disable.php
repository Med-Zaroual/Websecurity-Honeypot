<?php
session_start();
include("dbcon.php");

if(isset($_GET['user'])){
	$id=htmlspecialchars($_GET['user'],ENT_QUOTES, 'UTF-8');
	$user=getUserById($id);
	if($user['user_type'] !== "admin"){
		disable_user($id);
		header('location:boss.php');
	}
	else{
		header('location:error_403.php');
	}		
}

?>