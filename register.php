<?php require('dbcon.php');


  //if (isset($_POST['register']))
  
  if (isset($_POST['register']))
    {
      $email = $_POST['email'];
      $username = $_POST['user'];
      $password = $_POST['pass'];
      

      $query= "INSERT INTO Users (username , email, user_type,  password) VALUES('$username','$email','Normal User','$password')";
      $result=mysqli_query($con,$query);

      //get the user_id of the new added user
      //$row    = mysqli_fetch_array($query);
      //$num_row  = mysqli_num_rows($query);

      if($result){
            //header('location:home.php');
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
  
  <form action="#" method="post">
    <h3>Registration</h3>
	
    <label>Username:</label>
      <div class="form-item">
		    <input type="text" name="user" required="required" placeholder="Full Name" autofocus required></input>
      </div>
    
    <label>Email:</label>
      <div class="form-item">
		    <input type="text" name="email" required="required" placeholder="Type your Email" ></input>
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
