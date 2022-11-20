<?php 
include('dbcon.php');
include('session.php'); 

$row=getUserById($session_id);

?>

<?php include('header.php')?>

<div class="form-wrapper-home"> 
    <center><h3>Welcome:<i> <?php echo $row['username']; ?></i> </h3></center>

<!-- https://bbbootstrap.com/snippets/bootstrap-5-profile-card-animation-74461039 -->
<!-- https://freefrontend.com/bootstrap-profiles/ -->
    <div class="profile">

        <div class="image">
            <img src="https://i.imgur.com/wvxPV9S.png"/>
            <!-- <img src="Assets/img/bg.jpg"/> -->
            <br><br>
            <button class="btn1">Upload avatar</button>
        </div>

        <div class="profile_info">
            <span class="name"><?php echo $row['username']; ?>
            </span> 
            <span class="idd">
                <i style="color: white;"> (<?php echo ucfirst($row['user_type']); ?>)
                </i>
            </span>
            <br>
            <div class="email">
                <span >Email: 
                    <span class="follow"><?php echo $row['email']?>
                    </span>
                </span>
            </div>  
            
        </div>


    </div>

    <div class="edit_profile">
        <center>
        <button class="btn2">Edit Profile</button> 
        </center>
    </div>

    <hr><br>

    <center>
    <div class="text"> 
        <span>"<?php echo $row['username']; ?>" is one of the users in the Honeypot Project<br>(Web Security, Technology and honeypot) <br><br> Howest university of applied science. 
        </span> 
    </div> 
    </center>

    <div class="reminder">
        <p><a href="logout.php" class="button">Log out</a></p>
    </div>

</div>

</body>
</html>



<!-- notification message -->
   <!--  <div class="content">
        <?php
        if (isset($_SESSION['success'])): ?>
            <h3>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['succes']); //unset() destroys the specified variable
                ?>        
            </h3>
        <?php endif ?>  
    </div> -->

    
 <!--    <div class="profile_info">
        <img src="img/user.jpg">
            <div>
                <strong><?php echo $row['username']; ?></strong>
                <small>
                    <i style="color: white;">(<?php echo ucfirst($row['user_type']); ?>)</i><br>
                </small><br>
                <strong><?php echo $row['email']?></strong>
            </div>
    </div> -->