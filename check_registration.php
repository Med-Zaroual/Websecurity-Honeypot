<?php session_start(); ?>
<?php include('dbcon.php'); 

if (isset($_POST['register']))
    {
      //assign data received from post to variables
      $email = $_POST['email'];
      $username = $_POST['user'];
      $password1 = $_POST['pass'];
      $password_conf = $_POST['conf_pass'];

      // form validation: ensure that the form is correctly filled
      if ($password1 !== $password_conf) {
        //array_push($errors, "The two passwords do not match");
        echo "passwords are not matched!";
      }
      else{
        //Encrypt Created Password
        $password=md5($password1);

        //Ship data to Database
        $query= "INSERT INTO Users (username , email, user_type,  password, status) VALUES('$username','$email','user','$password','0')";
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