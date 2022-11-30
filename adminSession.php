<?php
require ('session.php');
include ('dbcon.php');

$row=getUserById($session_id);

if($row['user_type']!=='admin'){
	header('location:error_403.php');
}

?>