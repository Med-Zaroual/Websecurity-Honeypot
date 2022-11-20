<?php
session_start();
include("dbcon.php");

if(isset($_GET['user'])){
	$id=$_GET['user'];
	enable_user($id);
	header('location:admin.php');
}

?>