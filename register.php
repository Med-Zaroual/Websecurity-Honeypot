<?php session_start(); ?>
<?php require('dbcon.php');

  
  if (isset($_POST['register']))
    {
      //assign data received from post to variables
      $email = $_POST['email'];
      $username = $_POST['user'];
      $password1 = $_POST['pass'];

      //Encrypt Created Password
      $password=md5($password1);

      // form validation: ensure that the form is correctly filled
      if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
      }

      //Ship data to Database
      $query= "INSERT INTO Users (username , email, user_type,  password) VALUES('$username','$email','Normal User','$password')";
      $result=mysqli_query($con,$query);
      
      $_SESSION['success']="You are now logged in";
      
      // get id of the created user and assign it to the new session
      $logged_in_user_id = mysqli_insert_id($con);
      $_SESSION['user_id']= $logged_in_user_id;

      // put logged in user in session, Storing the user in a session variable means that the user is available even if you refresh and navigate to other pages
      $_SESSION['current-user']= getUserById($logged_in_user_id); // put logged in user in session

      //check if data has been successfully tranferred
      if($result){
            header('location:home.php');
            $msg = " Registered Sussecfully";
        }
      else
            $msg = " Error Registering";
      echo $msg;
    }    


 ?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>

<header>
  
  <div>
    <h1><center> Rigester new Account </center></h1>
  </div>
  
</header>


<div class="form-wrapper-Register">
  
  <form action="register.php" method="post">
    <h3>Registration</h3>
	
    <label>Username:</label>
      <div class="form-item">
		    <input type="text" name="user" value="<?php echo $username ?>" required="required" placeholder="Full Name" autofocus required></input>
      </div>
    
    <label>Email:</label>
      <div class="form-item">
		    <input type="text" name="email" value="<?php echo $email ?>" required="required" placeholder="Type your Email" ></input>
      </div>

    <label>Password: </label>
      <div class="form-item">
        <input type="password" name="pass" required="required" placeholder="Password" autofocus></input>
      </div>

    <label>Confirm Password: </label>
      <div class="form-item">
        <input type="password" name="conf_pass" required="required" placeholder="Confirm Password" required></input>
      </div>
    
    <div class="button-panel">
		  <input type="submit" class="button" title="Registration" name="register" value="Register"></input>
    </div>

  </form>
  <p>
    Already a member? <a href="index.php">Sign in</a>
  </p>

</div>


</body>
</html>
