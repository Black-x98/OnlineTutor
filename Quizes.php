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
			<div class="dropdown">
				<button class="dropbtn">SignUp
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="SignUp.php">As Instructor</a>
					<a href="SignUp.php">As Student</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Login 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="InstructorLogin.php">As Instructor</a>
					<a href="StudentLogin.php">As Student</a>
				</div>
			</div>
		</div>
		
		<div class="container">
			<h1> Quizs </h1>
			<div class="full">
				<h3>Question</h3>
				
				<form>
					<input type="radio" name="Option1" value="">Option 1<br>
					<input type="radio" name="Option2" value="">Option 2<br>
					<input type="radio" name="Option3" value="">Option 3<br>
					<input type="radio" name="Option4" value="">Option 4<br>
				</form>
				
				<h3>Question</h3>
				
				<form>
					<input type="radio" name="Option1" value="">Option 1<br>
					<input type="radio" name="Option2" value="">Option 2<br>
					<input type="radio" name="Option3" value="">Option 3<br>
					<input type="radio" name="Option4" value="">Option 4<br>
				</form>
				
				<h3>Question</h3>
				
				<form>
					<input type="radio" name="Option1" value="">Option 1<br>
					<input type="radio" name="Option2" value="">Option 2<br>
					<input type="radio" name="Option3" value="">Option 3<br>
					<input type="radio" name="Option4" value="">Option 4<br>
				</form>
				<input type="submit" value="Submit">
			</div>
		</div>
	</body>
	
</html>