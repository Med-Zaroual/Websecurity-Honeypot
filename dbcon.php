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

//get Users by the sessions's user information
function getUserBySessionId($id){
  global $con;
  $result=mysqli_query($con, "select * from Users where user_id='$id'")or die('Error In Session');
  $row=mysqli_fetch_array($result);
  return $row;
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


function isAdmin(){
  if ($_SESSION['user_type'] === 'admin'){
    header('location:admin.php');
  }
  else{
    header('location:home.php');
  }
}

 

?>