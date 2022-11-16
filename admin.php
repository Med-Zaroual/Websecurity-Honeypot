<?php 
include('session.php'); 
//session_start();
include('header.php'); 
include ('dbcon.php');

$liste=getAllUsers();
$nb1=count($liste);
$nb=Nb_log_in();
$row=getUserBySessionId($session_id);

?>
<h1><center>Welcome in the Admin Panel, Mr: <strong>Admin</strong></center></h1>

<hr>
<h2> the number of users corrently logged in among all Users: <strong><?php echo $nb." / ".$nb1 ?></strong> </h2>
<hr>
<table border="1">
	<tr bgcolor="white">
		<td style="color:black;">Status</td>
		<td style="color:black;">Username</td>
		<td style="color:black;">Email</td>
		<td style="color:black;">User Type</td>
		<td></td>
		<td></td>
	</tr>
	
		<?php
			foreach ($liste as $user) {
				$id=$user["user_id"];

				if ($user["user_type"]!=="admin"){
						echo
					"
						<tr>
						<td>".getStatus($id)."</td>
						<td>".$user["username"]."
						<td>".$user["email"]."
						<td>".$user["user_type"]."
						<td><a href=\"enable.php?user=$id\">Enable</a></td>
						<td><a href=\"disable.php?user=$id\">Disable</a></td>
						</tr>
					";
				}
				else {
					echo
					"
						<tr>
						<td>".getStatus($user["user_id"])."</td>
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
