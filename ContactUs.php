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
			<h3>Contact Us</h3>
			<div class="formContainer">
				
			  <form action="/action_page.php">
				<label for="fname">First Name</label>
				<input type="text" id="fname" name="firstname" placeholder="Enter first name" required>

				<label for="lname">Last Name</label>
				<input type="text" id="lname" name="lastname" placeholder="Enter last name">
				
				<label for="email">Email</label><br>
				<input type="text" placeholder="Enter Email" name="email" required><br>
					

				<label for="subject">Your Message</label>
				<textarea id="subject" name="subject" placeholder="Write your message" style="height:200px"></textarea>

				<input type="submit" value="Submit">
			  </form>
			</div>
		</div>
	</body>
	
</html>