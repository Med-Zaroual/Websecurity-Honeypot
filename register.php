<?php session_start(); ?>
<?php require('dbcon.php'); 
      include('header.php');


$Error_msg='';

if (isset($_POST['register']))
    {
      //assign data received from post to variables
      $email =  htmlentities($_POST['email']);
      $username = htmlentities($_POST['user']);
      $password1 = htmlentities($_POST['pass']);
      $password_conf = htmlentities($_POST['conf_pass']);

      $errors=checkPassword($password1);

      if(checkEmail($email) == true ){
        if(($password1 == $password_conf)){
          
          if(empty($errors)){
            //Encrypt Created Password
            $password=md5($password1);
            
            $query= "INSERT INTO Users (username , email, user_type,  password, image, status,date_created) VALUES('$username','$email','user','$password','','0',now())";
            $result=mysqli_query($con,$query);
            if($result){
                  header('location:home.php');
                  $logged_in_user_id = mysqli_insert_id($con);
                  $_SESSION['user_id']= $logged_in_user_id;
                  changeStatus($_SESSION['user_id']); // Change status to '1', Once connected.
                  //$msg = " Registered Sussecfully";
              }else
                //echo " Error Registering";
                $Error_msg=" Error Registering";
          }else{
            $Error_msg=$errors;
          }         
        }else{
          $Error_msg="passwords are not matched!";
        }
      }else{
        $Error_msg="Email not Correct";
      }

      
      $_SESSION['Error_msg']=$Error_msg;

} 

?>


<div class="form-wrapper-Register">
  
  <form action="register.php" method="post">
    <!-- display error in registration -->
    <div class="error"> 
      <?php
      if(isset($_SESSION['Error_msg'])){
        $Error_msg=$_SESSION['Error_msg'];
        echo $Error_msg;
      } 
      unset($_SESSION['Error_msg']);  
      ?>
    </div>
    <h3>Registration</h3>
	
    <label>Username:</label>
      <div class="form-item">
		    <input type="text" name="user"  required="required" placeholder="Full Name" autofocus required></input>
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
