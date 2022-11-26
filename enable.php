<?php
session_start();
include("dbcon.php");

if(isset($_GET['user'])){
	$id=htmlspecialchars($_GET['user'],ENT_QUOTES, 'UTF-8');
	enable_user($id);
	header('location:admin.php');
}

?>