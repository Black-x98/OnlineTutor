<?php
session_start();
//$GLOBALS['var'] = 0;
?>

<?php
 $db = mysqli_connect('localhost','root','','test_db')
 or die('Error connecting to MySQL server.');
 $curr_crs_code = null;

?>

<?php
if(isset($_POST["enroll_to_course"]))
{
	
	$db = mysqli_connect('localhost','root','','test_db')
	or die('Error connecting to MySQL server.');
	$curr_std_id = $_SESSION['std_id'];
	$this_crs_code = $_POST['enroll_to_course'];
	$this_crs_code = "code" . $this_crs_code;
	$date = date("Y-m-d");
	echo $curr_std_id . " " . $this_crs_code . " " . $date;
	
	$enr_crs_query="insert into enrollment (std_id,course_code,date_of_enrollment,rating) values ('$curr_std_id','$this_crs_code','$date','');";
	$enroll_course=mysqli_query($db,$enr_crs_query);// or die('Error enrolling to the new course.');
	$temp_crs_code = $this_crs_code;
	//echo "After unsetting " . $_SESSION[curr_crs_code];
	if($enroll_course==true){
		echo "Enrolled to course $this_crs_code";
		
		
		
	}
	else{
		echo "Failed";
	}
	
	//header("Location:SingleCourse.php?variable='$temp_crs_code'");
	
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
		    <div style="width:800px; margin:0 auto;">
			
			  <?php
			  
					$query = "select * from course";
					
					$course_query = mysqli_query($db,$query) or die('Error querying database.');
					
					echo nl2br("\n\n\n  ");
					
					$var=1;
					
					while ($row = $course_query->fetch_assoc()) {
						
						$course_link = $row["clink"];
						
						echo nl2br($row["course_code"] ." ***   ". $row["course_name"] . " ***   " . "<a href=" . $course_link . "><b>link</b></a>  " . "\n");
						
						if($_SESSION['card']=="student"){
							
							$this_crs = $row["course_code"];
							$this_std = $_SESSION['std_id'];
							
							
						
							$check_enroll = "select * from enrollment where std_id = '$this_std' and course_code = '$this_crs';";
							$chk_enroll_result = mysqli_query($db,$check_enroll) or die('Error querying database.');
							
							if(mysqli_num_rows($chk_enroll_result)==0){
								
								
								echo '<form method="post">
									<input type="hidden" name="enroll_to_course" value="'. $var .'">
									<button > Enroll to this course </button>
								</form>';
								
							}
							else{
								echo nl2br("\nAlready Enrolled");
							}
							
						}
						echo nl2br("\n\n\n");
						$var++;
					}
				 
			  
			  ?>  
		</div>
	</body>
</html>