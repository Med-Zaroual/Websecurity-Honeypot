<?php 
//include('session.php'); 
session_start();
include('header.php'); 
include ('dbcon.php');

$liste=getAllUsers();

?>

<h1><center> Users list </center><h1>
<hr>
<h2> the number of users corrently logged in : </h2>
<hr>
<table border="1">
	<tr>
		<td>Status</td>
		<td>Username</td>
		<td>User Type</td>
		<td>Email</td>
		<td></td>
		<td></td>
	</tr>
	
		<?php
			foreach ($liste as $user) {
				echo
				"
					<tr>
					<td></td>
					<td>".$user["username"]."
					<td>".$user["email"]."
					<td>".$user["user_type"]."
					<td><input type=\"submit\" value=\"Enable\"></input></td>
					<td><input type=\"submit\" value=\"Disable\"></input></td>
					</tr>
				"
			;}
		?>
	
	
</table>
