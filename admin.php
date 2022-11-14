<?php 
//include('session.php'); 
session_start();
include('header.php'); 
include ('dbcon.php');

$liste=getAllUsers();

?>

<h1><center> Users list </center></h1>
<hr>
<h2> the number of users corrently logged in : </h2>
<hr>
<table border="1">
	<tr bgcolor="blue">
		<td>Status</td>
		<td>Username</td>
		<td>User Type</td>
		<td>Email</td>
		<td></td>
		<td></td>
	</tr>
	
		<?php
			foreach ($liste as $user) {

				if ($user["user_type"]!=="admin"){
						echo
					"
						<tr>
						<td>".getStatus("user_id",$user["user_id"])."</td>
						<td>".$user["username"]."
						<td>".$user["email"]."
						<td>".$user["user_type"]."
						<td><input type=\"submit\" value=\"Enable\"></input></td>
						<td><input type=\"submit\" value=\"Disable\"></input></td>
						</tr>
					";
				}
				else {
					echo
					"
						<tr>
						<td>".getStatus("user_id",$user["user_id"])."</td>
						<td>".$user["username"]."
						<td>".$user["email"]."
						<td>".$user["user_type"]."
						<td></td>
						<td></td>
						</tr>
					";
				}
			}
		?>	
</table>

<button><p><a href="logout.php">Log Out</a></p></button>
