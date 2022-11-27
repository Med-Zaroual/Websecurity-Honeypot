<?php 
 session_start(); 
 include('dbcon.php');
 ?>


 <?php  include('header.php') ?>

<div class="form-wrapper">
  
  <form action="check_login.php" method="post">
    <h3>Login here</h3>
	
    <div class="form-item">
		<input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="pass" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>

  <div class="reminder">
    <p>Not a member? <a href="register.php">Sign up now</a></p>
    <p><a href="#">Forgot password?</a></p>
  </div>
  
</div>

</body>
</html>
