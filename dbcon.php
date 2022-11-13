<?php
//session_start();

$username = "";
$email = "";
$errors = array();

$con = mysqli_connect("localhost","root","Amir0618104127.","login");

// Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }
// else {
//   echo "Connected to Database";}






function register(){

  
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

}


//return user array from their id
function getUserById($id){
  global $con;
  $query="select * from Users where user_id=".$id;
  $request=mysqli_query($con,$query);

  $user = mysqli_fetch_assoc($result);
  return $user;
}

// escape string
function escape($val){
  global $con;
  return mysqli_real_escape_string($con, trim($val));
}


//display Errors
function display_error() {
  global $errors;

  if (count($errors) > 0){
    echo '<div class="error">';
      foreach ($errors as $error){
        echo $error .'<br>';
      }
    echo '</div>';
  }
}

function isAdmin()
{
  if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
    return true;
  }else{
    return false;
  }
}



 

?>