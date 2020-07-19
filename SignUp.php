<?php

session_start();

if (empty($_SESSION)!=true){
	if($_SESSION['card']=="student"){
		header("Location:StudentProfile.php");
	}
	else if($_SESSION['card']=="instructor"){ 
		header("Location:InstructorProfile.php");
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="SignLogStyle.css">
	</head>
	<body>

		<div class="header">
		  <h1>Online Tutor</h1>
		  <p>A place to teach yourself</p>
		</div>

		
		
		<form action="Signup_action.php" >
		
			<div class="container">
				<div class="signupbg">
				
				<h1>Sign Up</h1>
				
				<p>Please fill in this form to create an account.</p>
				
				<label for="name"><b>Name</b></label><br>
				<input type="text" placeholder="Enter Name" name="name" required><br>
				
				<label for="email"><b>Email</b></label><br>
				<input type="text" placeholder="Enter Email" name="email" required><br>
				
				<label for="usertype"><b>User type</b></label><br>
				<select name = "usertype">
				  <option value="student">Student</option>
				  <option value="instructor">Instructor</option>
				</select><br><br>
				
				<label for="dob"><b>Date of Birth</b></label><br>
				<input type="date" placeholder="Enter birth date" name="dob" required><br><br>
				
				<label for="username"><b>User Name</b></label><br>
				<input type="text" placeholder="Enter User Name" name="username" required><br>
	

				<label for="psw"><b>Password</b></label><br>
				<input type="password" placeholder="Enter Password" name="psw" required><br>

				<label for="psw-repeat"><b>Repeat Password</b></label><br>
				<input type="password" placeholder="Repeat Password" name="psw-repeat" required>
				
				
				<p>Already have an account? <a href="Login.php" style="color:dodgerblue">Log in here</a></p>

				<div class="clearfix">
				  <button type="button" class="cancelbtn">Cancel</button>
				  <button type="submit" class="signupbtn">Sign Up</button>
				</div>
				</div>
			</div>
		</form>

	</body>
</html>
