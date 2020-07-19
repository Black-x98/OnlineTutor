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
			<h2>Content Upload</h2>
			<div class="formContainer">
				
			  
				<label for="fname">Course Name</label>
				<input type="text" id="fname" name="firstname" placeholder="Enter course name">

				<label for="lname">Course ID</label>
				<input type="text" id="lname" name="lastname" placeholder="Enter Course ID" required>
				
				<label for="email">Content ID</label><br>
				<input type="text" placeholder="Enter Content ID" name="email" required><br>
					
				<label for="subject">Content</label>
				
				<textarea id="subject" name="subject" placeholder="Enter Content" style="height:200px"></textarea>
				
				<form action="up_action.php" method="post" enctype="multipart/form-data">

				<input type="file" name="file" size="50000" />

				<br />

				<input type="submit" value="Upload" />

				</form>
			</div>
		</div>
	</body>
	
</html>