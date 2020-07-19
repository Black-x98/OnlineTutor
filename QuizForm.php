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
		    <a href="Contact.php">Contact us</a>
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
			<h3>Contact Us</h3>
			<div class="formContainer">
				
			  <form action="/action_page.php">
				<label for="fname">Course Name</label>
				<input type="text" id="fname" name="firstname" placeholder="Enter course name">

				<label for="lname">Course ID</label>
				<input type="text" id="lname" name="lastname" placeholder="Enter Course ID" required>
				
				<label for="email">Content ID</label><br>
				<input type="text" placeholder="Enter Content ID" name="email" required><br>
					

				<label for="subject">Quiz</label>
				<textarea id="subject" name="subject" placeholder="Enter Quiz" style="height:200px"></textarea>
				
				<label for="email">Answer</label><br>
				<input type="text" placeholder="Enter Quiz Answer" name="email" required><br>

				<input type="submit" value="Submit">
			  </form>
			</div>
		</div>
	</body>
	
</html>