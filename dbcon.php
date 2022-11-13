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
      $email = escape($_POST['email']);
      $username = escape($_POST['user']);
      $password = escape($_POST['pass']);
      

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