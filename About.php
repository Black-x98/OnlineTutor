<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>OnlineTutor</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="OtherPageStyle.css">
		
	</head>
	<body>

		<div class="header">
		  <h1>Online Tutor</h1>
		  
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
		<div class="container">
			<h2> About Site </h2>
			<div class="full">
				This site is for self-learning purpose.<br>
				Users can enroll to available courses or set up courses through this website.<br>
				The website is free for use.<br>
				
			</div>
			<hr>
			<h2> About Us </h2>
			<div class="mid1">
				<img src="arman.jpg" width="50%" height="70%">
				<h1> Md. Aminul Islam </h1>
				<p>
					<i>Department of Computer Science and Engineering</i><br>
					<i>University of Dhaka</i><br>
					<i>E-mail: aminarman21@gmail.com</i><br>
					<i>Facebook, Linkedin</i><br>
				</p>
			</div>
			
			
			<div class="mid2">
				<img src="seltedf.jpg" width="50%" height="70%">
				<h1> Dewan Tariq Hasan </h1>
				<p>
					<i>Department of Computer Science and Engineering</i><br>
					<i>University of Dhaka</i><br>
					<i>E-mail: tariq.hasan.csedu21@gmail.com</i><br>
					<i>Facebook, Linkedin</i><br>
				</p>
			</div>
		</div>
	</body>
	
</html>