<?php 
include('dbcon.php');
include('session.php'); 

$row=getUserBySessionId($session_id);


?>

<?php include('header.php')?>

<div class="form-wrapper-home"> 
    <center><h3>Welcome: <?php echo $row['username']; ?> </h3></center>

<!-- https://bbbootstrap.com/snippets/bootstrap-5-profile-card-animation-74461039 -->
<!-- https://freefrontend.com/bootstrap-profiles/ -->
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4"> 
            <div class=" image d-flex flex-column justify-content-center align-items-center"> 
                <!-- <button class="btn btn-secondary">  -->
                    <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" />
                <!-- </button>  -->
                <br>
                <div class=" d-flex mt-2"> 
                    <button class="btn1 btn-dark">Upload avatar</button> 
                </div>
                <center>
                <span class="name mt-3"><?php echo $row['username']; ?></span> 
                <span class="idd"><i style="color: white;">(<?php echo ucfirst($row['user_type']); ?>)</i></span> 
                 <br><br>
                <div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
                    <span class="number">Email: 
                        <span class="follow"><?php echo $row['email']?></span>
                    </span>
                </div> 
                 <br><br>
                <div class=" d-flex mt-2"> 
                    <button class="btn1 btn-dark">Edit Profile</button> 
                </div> 
                <hr><br>
                <div class="text mt-3"> 
                    <span><?php echo $row['username']; ?> is one of the users in the Honeypot Project<br>(Web Security, Technology and honeypot) <br><br> Howest university of applied science. </span> 
                </div> 
                </center>
                <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
                    <span><i class="fa fa-twitter"></i></span> 
                    <span><i class="fa fa-facebook-f"></i></span> 
                    <span><i class="fa fa-instagram"></i></span> 
                    <span><i class="fa fa-linkedin"></i></span> 
                </div> 
                
            </div> 
        </div>
    </div>

    <div class="reminder">
        <p><a href="logout.php">Log out</a></p>
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