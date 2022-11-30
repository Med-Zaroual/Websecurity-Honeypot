

<!-- <html lang="en">
<head>
  <meta charset="utf-8">
  <title>Responsive Cards UI Design</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Assets/css/styles.css">
</head>
<body> -->
<?php 
// require('dbcon.php');
require('session.php');  
include('header.php');
include('dbcon.php');

$user=getUserById($session_id);
?>
 
<div class="wrapper">
	<div class="header">
		<p>Challenges</p>

		<div class="go_home"><a href="home.php">Profile</a></div>
	</div>
	<div class="cards_wrap">


<!------------------------ challenge 1 -------------------------->
		<div class="card_item">
			<div class="card_inner">
				<img src="Assets/img/csdcqs.png">

				<form action="check_challenges.php" method="POST">

					<div class="chall_nb" name="chall_1">
						<a href="challenges/chall-8297921.php">Challenge 1 </a>
					</div>
					<div class="chall_name">(10 points)</div>
					<div class="film">Try to find the admin username and password to get access</div>
					<br>
					<div>
						<input  type="text" placeholder="Type the Flag here" name="response1" />
						<input type="submit" class="button"  name="submitFlag" value="Submit">
					</div>
					<br>
					<div>
						<h3><?php
							if($user['question1']=='1'){
								echo "Solved!";
							}else{
								 echo"Not yet Solved";
							}
						?></h3>
					</div>

				</form>
			</div>
		</div>

<!------------------------ challenge 2 -------------------------->
		<div class="card_item">
			<div class="card_inner">
				<img src="Assets/img/pngwing.com.png">

				<form action="check_challenges.php" method="POST">

					<div class="chall_nb" name="chall_2">
						<a href="chall-8297921.php">Challenge 2 </a>
					</div>
					<div class="chall_name">(10 points)</div>
					<div class="film">IN PROCESS !</div>
					<br>
					<div>
						<input  type="text" placeholder="Type the Flag here" name="response1" />
						<input type="submit" class="button"  name="submitFlag" value="Submit">
					</div>
					<br>
					<div>
						<h3><?php
							if($user['question1']=='2'){
								echo "Solved!";
							}else{
								 echo"Not yet Solved";
							}
						?></h3>
					</div>

				</form>
			</div>
		</div>

<!------------------------ challenge 3 -------------------------->
		<div class="card_item">
			<div class="card_inner">
				<img src="Assets/img/clipart281610.png">

				<form action="check_challenges.php" method="POST">

					<div class="chall_nb" name="chall_3">
						<a href="chall-8297921.php">Challenge 3</a>
					</div>
					<div class="chall_name">(10 points)</div>
					<div class="film">IN PROCESS !</div>
					<br>
					<div>
						<input  type="text" placeholder="Type the Flag here" name="response1" />
						<input type="submit" class="button"  name="submitFlag" value="Submit">
					</div>
					<br>
					<div>
						<h3><?php
							if($user['question1']=='3'){
								echo "Solved!";
							}else{
								 echo"Not yet Solved";
							}
						?></h3>
					</div>

				</form>
			</div>
		</div>






		<!-- 
		<div class="card_item">
			<div class="card_inner">
				<img src="Assets/img/black_panther.png">
				<div class="chall_nb"><a href="">Challenge 3 (10 points)</a></div>
				<div class="chall_name">SQLi</div>
				<div class="film">Exploit this vulnerability in PHP</div>
				<br>
				<div>
					<form action="" method="POST">
						<input type="text" placeholder="Type the Flag here" />
						<input type="submit" class="button"  name="submitFlag" value="Submit">
					</form>
				</div>
				<div><p>Not yet Solved</p></div>
			</div>
		</div>
		<div class="card_item">
			<div class="card_inner">
				<img src="Assets/img/black_panther.png">
				<div class="chall_nb"><a href="">Challenge 4 (10 points)</a></div>
				<div class="chall_name">SQLi</div>
				<div class="film">Exploit this vulnerability in PHP</div>
				<br>
				<div>
					<form action="" method="POST">
						<input type="text" placeholder="Type the Flag here" />
						<input type="submit" class="button"  name="submitFlag" value="Submit">
					</form>
				</div>
				<div><p>Not yet Solved</p></div>
			</div>
		</div> -->
		<!-- <div class="card_item">
			<div class="card_inner">
				<img src="Assets/img/black_panther.png">
				<div class="chall_nb"><a href="">Challenge 5 (10 points)</a></div>
				<div class="chall_name">SQLi</div>
				<div class="film">Exploit this vulnerability in PHP</div>
				<br>
				<div>
					<form action="" method="POST">
						<input type="text" placeholder="Type the Flag here" />
						<input type="submit" class="button"  name="submitFlag" value="Submit">
					</form>
				</div>
				<div><p>Not yet Solved</p></div>
			</div>
		</div>
		<div class="card_item"> -->
		
		

	</div>
</div>  

</body>
</html>
