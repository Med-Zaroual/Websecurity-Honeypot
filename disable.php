<?php
session_start();
include("dbcon.php");

if(isset($_GET['user'])){
	$id=$_GET['user'];
	$request=mysqli_query($con,"update Users set user_type=\"blocked\" where user_id='$id'");
	header('location:admin.php');
}

?>