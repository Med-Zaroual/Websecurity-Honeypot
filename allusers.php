<?php include('dbcon.php');

$users=array();
$result=mysqli_query($con,"select * from Users where user_type='Normal user'");
$users=mysqli_fetch_all($result,MYSQLI_ASSOC);

print_r($users);




