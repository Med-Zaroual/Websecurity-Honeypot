<?php 
include('dbcon.php');
include('session.php'); 

$row=getUserBySessionId($session_id);

?>

<?php include('header.php')?>

<div class="form-wrapper"> 
    <center><h3>Welcome: <?php echo $row['username']; ?> </h3></center>

    <!-- notification message -->
    <div class="content">
        <?php
        if (isset($_SESSION['success'])): ?>
            <h3>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['succes']); //unset() destroys the specified variable
                ?>        
            </h3>
        <?php endif ?>  
    </div>

    <!-- logged in user information -->
    <div class="profile_info">
        <img src="img/user.jpg">
            <div>
                <strong><?php echo $row['username']; ?></strong>
                <small>
                    <i style="color: white;">(<?php echo ucfirst($row['user_type']); ?>)</i><br>
                </small><br>
                <strong><?php echo $row['email']?></strong>
            </div>
    </div>

    <div class="reminder">
        <p><a href="logout.php">Log out</a></p>
    </div>

</div>

</body>
</html>