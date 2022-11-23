
<div class="form-wrapper-Register">
  
  <form action="check_registration.php" method="post">
    <h3>Registration</h3>
	
    <label>Username:</label>
      <div class="form-item">
		    <input type="text" name="user" value="<?php echo $username ?>" required="required" placeholder="Full Name" autofocus required></input>
      </div>
    
    <label>Email:</label>
      <div class="form-item">
		    <input type="text" name="email" value="<?php echo $email ?>" required="required" placeholder="Type your Email" ></input>
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
