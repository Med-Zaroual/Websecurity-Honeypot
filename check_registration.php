<?php session_start(); ?>
<?php include('dbcon.php'); 

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
            //$msg = " Registered Sussecfully";
        }
      else
            $msg = " Error Registering";
      echo $msg;
    }    