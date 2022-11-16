<?php
include ('dbcon.php');
session_start();
session_destroy();

$session_id=$_SESSION['user_id'];

$request=mysqli_query($con,"update Users set status='0' where user_id='$session_id'");
header('location:index.php');


?>