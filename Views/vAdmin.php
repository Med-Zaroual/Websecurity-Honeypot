
<h1><center>Welcome in the Admin Panel, Mr/Mrs: <i><?php echo $row["username"];?></i></center></h1>

<hr>
<h2> The number of users corrently logged in among all Users: <strong><?php echo $nb." / ".$nb1 ?></strong> </h2>
<hr>
<div class="table-wrapper">
	<table class="fl-table">
		<thead>
			<tr bgcolor="white">
				<!-- <th style="color:black;">Status</th> -->
				<th>Status</th>
				<th>Username</th>
				<th>Email</th>
				<th>User Type</th>
				<th>Enable User</th>
				<th>Disable User</th>
			</tr>
		</thead>
		<tbody>
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
							<td class=\"select\"><a class=\"button\" href=\"index.php?action=enable&user=$id\">Enable</a></td>
							<td class=\"select\"><a class=\"button\" href=\"index.php?action=disable&user=$id\">Disable</a></td>
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
		</tbody>
	</table>
</div>

<div class="reminder">
    <p>
    	<a href="index.php?action=logout" class="button">Log out</a>
    </p>
</div>

</body>
</html>
