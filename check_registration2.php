<?php session_start(); ?>
<?php include('dbcon.php'); 

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
          //Encrypt Created Password
          if(empty($errors)){
            $password=md5($password1);
            $query= "INSERT INTO Users (username , email, user_type,  password, image, status,date_created) VALUES('$username','$email','user','$password','','0',now())";
            $result=mysqli_query($con,$query);
            if($result){
                  header('location:home.php');
                  changeStatus($_SESSION['user_id']); // Change status to '1', Once connected.
                  //$msg = " Registered Sussecfully";
              }else
                echo " Error Registering";
                  //$msg = " Error Registering";
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

      //================================ Session Operations =============================
        $_SESSION['success']="You are now logged in";
          
        // get id of the created user and assign it to the new session
          $logged_in_user_id = mysqli_insert_id($con);
          $_SESSION['user_id']= $logged_in_user_id;

        // put logged in user in session, Storing the user in a session variable means that the user is available even if you refresh and navigate to other pages
          $_SESSION['current-user']= getUserById($logged_in_user_id); // put logged in user in session
      //================================================================================================




//$date = date('Y-m-d H:i:s');
// If you're looking to store the current time just use MYSQL's functions.

// mysql_query("INSERT INTO `table` (`dateposted`) VALUES (now())");
// If you need to use PHP to do it, the format it Y-m-d H:i:s so try

// $date = date('Y-m-d H:i:s');
// mysql_query("INSERT INTO `table` (`dateposted`) VALUES ('$date')");       