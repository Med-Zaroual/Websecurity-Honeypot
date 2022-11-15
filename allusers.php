<?php include('dbcon.php');

$users=array();
$result=mysqli_query($con,"select * from Users where user_type='Normal user'");
$users=mysqli_fetch_all($result,MYSQLI_ASSOC);

print_r($users);


// CREATE TABLE `login`.`Users` (
//   `user_id` INT(11) GENERATED ALWAYS AS () VIRTUAL,
//   `username` VARCHAR(45) NOT NULL,
//   `email` VARCHAR(45) NOT NULL,
//   `user_type` VARCHAR(45) NOT NULL,
//   `password` VARCHAR(45) NOT NULL,
//   `image` VARCHAR(45) NOT NULL,
//   PRIMARY KEY (`user_id`),
//   UNIQUE INDEX `user_id_UNIQUE` (`user_id` ASC) VISIBLE)
// ENGINE=InnoDB DEFAULT CHARSET=latin1;

// INSERT INTO `login`.`Users` (`user_id`, `username`, `email`, `user_type`, `password`) VALUES ('1', 'admin', 'admin@admin.com', 'admin', 'admin123.');
// INSERT INTO `login`.`Users` (`user_id`, `username`, `email`, `user_type`, `password`) VALUES ('2', 'rozarot', 'med.zaroual.303@gmail.com', 'admin', 'rozarot123.');
// INSERT INTO `login`.`Users` (`user_id`, `username`, `email`, `user_type`, `password`) VALUES ('3', 'ebennezer', 'benny@gmail.com', 'admin', 'benny123.');
// INSERT INTO `login`.`Users` (`user_id`, `username`, `email`, `user_type`, `password`) VALUES ('4', 'jeffrey', 'jeffrey@gmail.com', 'admin', 'jeffrey123.');
// INSERT INTO `login`.`Users` (`user_id`, `username`, `email`, `user_type`, `password`) VALUES ('5', 'lecturer', 'lecturer@gmail.com', 'admin', 'lecturer123.');
// INSERT INTO `login`.`Users` (`user_id`, `username`, `email`, `user_type`, `password`) VALUES ('6', 'user1', 'user1@gmail.com', 'user', 'user1123.');