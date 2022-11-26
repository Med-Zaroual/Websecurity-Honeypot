<?php session_start(); ?>
<?php include('dbcon.php'); 

if (isset($_POST['register']))
    {
      //assign data received from post to variables
      $email =  htmlentities($_POST['email']);
      $username = htmlentities($_POST['user']);
      $password1 = htmlentities($_POST['pass']);
      $password_conf = htmlentities($_POST['conf_pass']);

      //$date = date('Y-m-d H:i:s');
// If you're looking to store the current time just use MYSQL's functions.

// mysql_query("INSERT INTO `table` (`dateposted`) VALUES (now())");
// If you need to use PHP to do it, the format it Y-m-d H:i:s so try

// $date = date('Y-m-d H:i:s');
// mysql_query("INSERT INTO `table` (`dateposted`) VALUES ('$date')");





      // form validation: ensure that the form is correctly filled
      if ($password1 !== $password_conf) {
        //array_push($errors, "The two passwords do not match");
        echo "passwords are not matched!";
      }
      else{
        //Encrypt Created Password
        $password=md5($password1); 
        

        //Ship data to Database
        $query= "INSERT INTO Users (username , email, user_type,  password, image, status,date_created) VALUES('$username','$email','user','$password','','0',now())";
        $result=mysqli_query($con,$query);




      //================================ Session Operations =============================
        $_SESSION['success']="You are now logged in";
          
        // get id of the created user and assign it to the new session
          $logged_in_user_id = mysqli_insert_id($con);
          $_SESSION['user_id']= $logged_in_user_id;

        // put logged in user in session, Storing the user in a session variable means that the user is available even if you refresh and navigate to other pages
          $_SESSION['current-user']= getUserById($logged_in_user_id); // put logged in user in session
      //================================================================================================


        //check if data has been successfully tranferred
          if($result){
                header('location:home.php');
                changeStatus($_SESSION['user_id']); // Change status to '1', Once connected.
                //$msg = " Registered Sussecfully";
            }
          else
                $msg = " Error Registering";
      echo $msg;
        }
    }    