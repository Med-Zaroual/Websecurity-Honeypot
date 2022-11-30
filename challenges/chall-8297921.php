<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Source Me!</title>
</head>
<body>
	<h2>Welcome to the admin portal!</h2>
	Currently, only the user who can login is 'admin'.
	<br>
	<!-- Shshhh, don't tell anyone. The admin password is a2aef7cfa7b2fd223f75b942f5061037. you returned? Well yeah it won't work without applying something on it ;) -->
	<form action="chall-8297921.php" method="get">
		<label>Username:</label>
		<input type="text" name="user"><br>
		<label>Password:</label>
		<input type="text" name="pass"><br>

		<input type="submit" value="submit"><br>
	</form>

<?php

if(isset($_GET['user']) && isset($_GET['pass'])){
	$username=$_GET['user'];
	$password=$_GET['pass'];
	if($username=='admin' && $password=='f7s0jk1'){
		echo "Welcome Admin, Here is your flag: actf{source_aint_secure}";
	}else{
		echo "Try Again, Username or Password incorrect !";
	}
}

?>

</body>
</html>