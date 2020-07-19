<?php

session_start();

if (empty($_SESSION)!=true){
	if($_SESSION['card']=="instructor"){ 
		header("Location:InstructorProfile.php");
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="OtherPageStyle.css">
		<link rel="stylesheet" href="HomeStyle.css">
		<link rel="stylesheet" href="SignLogStyle.css">
	</head>
	<body>

		<div class="header">
		  <h1>Online Tutor</h1>
		  <p>A place to teach yourself</p>
		</div>
		
		<div class="navbar">
		  <a href="Index.php">Home</a>
		  <a href="Courses.php">Courses</a>
		  <a href="About.php">About</a>
		  <a href="ContactUs.php">Contact us</a>
		
		<?php
			if(empty($_SESSION)==true){
				echo '<a href="Login.php">Log in</a>';
				echo '<a href="SignUp.php">Sign up</a>';
			}
			else{
				if($_SESSION['card']=="student") echo '<a href="StudentProfile.php">My profile</a>';
				else if($_SESSION['card']=="instructor") echo '<a href="InstructorProfile.php">My profile</a>';
				echo '<a href="logout.php">Log out</a>';
			} 	
		?>
		
		</div>
			
		<div class="row">
		  <div class="side">
			  <?php
			  echo '<h2>Student Name: '. $_SESSION['name']. '</h2>
			  <h4>User Name : '. $_SESSION['std_id'] . '</h4> ';
			  ?>
			  
			  <div class="clearfix">
				  <a href="MyCourses.php"><b>My Courses</b></a>
			  </div>
		  </div>
		  <div class="main">
			  
		  </div>
		</div>
	</body>
</html>