<?php
session_start();
include("dbcon.php");

if(isset($_GET['user'])){
	$id=$_GET['user'];
	disable_user($id);
	header('location:admin.php');
}

?>