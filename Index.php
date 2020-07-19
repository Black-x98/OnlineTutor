 <?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>OnlineTutor</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="HomeStyle.css">
		
	</head>
	
	<body>

		<div class="home_header">
		  <h1>Online Tutor</h1>
		  <p>A place to teach yourself</p>
		</div>

		<div class="navbar">
		  <a href="#">Home</a>
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

		<!--<div class="row">
		  <div class="side">
			  <h2></h2>
			  <h5></h5>
			  <div class="fakeimg" style="height:200px;">Image</div>
			  <p></p>
			  <h3>More Text</h3>
			  <p></p>
			  <div class="fakeimg" style="height:60px;">Image</div><br>
			  <div class="fakeimg" style="height:60px;">Image</div><br>
			  <div class="fakeimg" style="height:60px;">Image</div>
		  </div>
		  <div class="main">
			  <h2>TITLE HEADING</h2>
			  <h5>Title description, Dec 7, 2017</h5>
			  <div class="fakeimg" style="height:200px;">Image</div>
			  <p>Some text..</p>
			  <p></p>
			  <br>
			  <h2>TITLE HEADING</h2>
			  <h5>Title description, Sep 2, 2017</h5>
			  <div class="fakeimg" style="height:200px;">Image</div>
			  <p>Some text..</p>
			  <p></p>
		  </div>
		</div>

		<div class="footer">
		  <h2>Footer</h2>
		</div>-->

	</body>
</html>