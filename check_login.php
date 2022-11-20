<?php session_start(); ?>
<?php include('dbcon.php'); 

//check if the login button is clicked 
	if (isset($_POST['login']))
		{
			// For login security
			$username = mysqli_real_escape_string($con, $_POST['user']);
			$password = mysqli_real_escape_string($con, md5($_POST['pass']));

			//$password_enc=md5($password);
			$query= mysqli_query($con, "SELECT * FROM Users WHERE  password='$password' and username='$username'");

			$row= mysqli_fetch_array($query);
			$num_row= mysqli_num_rows($query);

			if ($num_row > 0) {			
				if($row['user_type']=="blocked"){
					//echo "This user is Blocked!";
					header('location:error_404.php');
				}
				else{
					$_SESSION['user_id']=$row['user_id'];
					changeStatus($row['user_id']); // Change status to '1', Once connected.
					$_SESSION['user_type']=$row['user_type'];
					isAdmin();
					}
			}
			else{	
					header('location:index.php');
					echo 'Invalid Username and Password Combination';
			}
		}


?>