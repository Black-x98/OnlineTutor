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
		
		<form action="Login_action.php" >
		
		<div class="container">
			
			<div class="loginbg">
			<h1>Log in</h1>
			
			<label for="usertype"><b>User type</b></label><br>
				<select name = "usertype">
				  <option value="student">Student</option>
				  <option value="instructor">Instructor</option>
			</select><br><br> 
			
			<label for="username"><b>User Name</b></label><br>
			<input type="text" placeholder="Enter User Name" name="username" required><br>

			<label for="psw"><b>Password</b></label><br>
			<input type="password" placeholder="Enter Password" name="psw" required><br>
			

			<div class="clearfix">
			  <button type="button" class="cancelbtn"><b>Cancel</b></button>
			  <button type="submit" class="signupbtn"><b>Log in</b></button>
			</div>
			<p>Don't have an account yet?<a href="SignUp.php" style="color:dodgerblue"> Sign up here </a></p>
			
			</div>
		</div>
		</form>

	</body>
</html>
