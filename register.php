<?php require('dbcon.php');


  //if (isset($_POST['register']))
  
  if (isset($_POST['register']))
    {
      $username = $_POST['user'];
      $password = $_POST['pass'];
      $fullname = $_POST['name'];

      $query= "INSERT INTO users (username , password , name) VALUES('$username','$password','$fullname')";
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


<div class="form-wrapper-Register">
  
  <form action="#" method="post">
    <h3>Registration</h3>
	
    <label>Full Name:</label>
    <div class="form-item">
		<input type="text" name="name" required="required" placeholder="Full Name" autofocus required></input>
    </div>
    
    <label>User Name:</label>
    <div class="form-item">
		<input type="text" name="user" required="required" placeholder="Username" required></input>
    </div>

    <label>code: </label>
    <div class="form-item">
    <input type="text" name="code" required="required" placeholder="E-mail" autofocus></input>
    </div>

    <label>Password: </label>
    <div class="form-item">
    <input type="password" name="pass" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Registration" name="register" value="Register"></input>
    </div>
  </form>


</div>


</body>
</html>
