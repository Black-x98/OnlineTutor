<?php
session_start();
?>

<?php
 $db = mysqli_connect('localhost','root','','test_db')
 or die('Error connecting to MySQL server.');
?>


<?php
if(isset($_POST["add_course"]))
{
	
	$db = mysqli_connect('localhost','root','','test_db')
	or die('Error connecting to MySQL server.');
	$query  = "select * from course";
	$result = mysqli_query($db,$query) or die('Error querying database.');
	$num_of_courses = mysqli_num_rows($result);
	$course_num = $num_of_courses + 1;
	$code = "code" . $course_num;
	$course_name = $_POST["cname"];
	$course_level = $_POST["clevel"];
	echo $course_name;
	echo $course_level;
	$curr_ins = $_SESSION["ins_id"];
	$add_crs_query = "insert into course (course_code,course_name,ins_id,level,num_of_enrolled,clink) values('$code','$course_name','$curr_ins','$course_level','0','--');";
	$insert_res = mysqli_query($db,$add_crs_query) or die('Error inserting new course into database.');
	if($insert_res==true){
		$path = $curr_ins . "\\" . $code;
		echo $path;
		if(!is_dir($path)) mkdir($path, 0777, true);
	}
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>OnlineTutor</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="HomeStyle.css">
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
		
		
		<div class="row">
		    <div class="tab">
			
			  <?php
			  
			  if($_SESSION['card']=="instructor"){
				  
					$curr_ins_id = $_SESSION['ins_id'];
					$query = "select * from course where ins_id='$curr_ins_id';";
					
					$course_query = mysqli_query($db,$query) or die('Error querying database.');
					
					
					while ($row = $course_query->fetch_assoc()) {
						
						$course_link = $row["clink"];
						$crscd = $row["course_code"];
						
						echo nl2br("\n\n\n" . $row["course_code"] . " " . $row["course_name"] ." "  );
						echo "<a href='SingleCourse.php?variable="."$crscd'>Link</a>";
							
					}
					echo nl2br("\n\n\n");
					
					echo '<form method="post">
						Input Course Name: <input type="text" name="cname" required><br>
						Input Course Level: <input type="text" name="clevel" required><br>
						<input type="hidden" name="add_course">
						<button > Add new course </button>
					</form>';
				  
			  }
			  else if($_SESSION['card']=="student"){
				  
					$curr_std_id = $_SESSION['std_id'];
					$query = "select * from enrollment natural join course where std_id='$curr_std_id';";
					
					$course_query = mysqli_query($db,$query) or die('Error querying database.');
					
					while ($row = $course_query->fetch_assoc()) {
						
						$course_link = $row["clink"];
						$crscd = $row["course_code"];
						
						echo nl2br("\n\n\n" . $row["course_code"] . " " . $row["course_name"] ." "  );
						echo "<a href='SingleCourse.php?variable="."$crscd'>Link</a>";
						
					}
			  }
			
			?>
		    </div>
			
		  
		  
		</div>
	
		
	</body>
	
</html>