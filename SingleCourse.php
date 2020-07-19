<?php
session_start();
?>

<?php
 $db = mysqli_connect('localhost','root','','test_db')
 or die('Error connecting to MySQL server.');
 
?>

<?php
if(isset($_POST["add_new_content"]))
{
	
	$db = mysqli_connect('localhost','root','','test_db')
	or die('Error connecting to MySQL server.');
	$curr_course_id = $_GET['variable'];
	$query  = "select * from course where course_code = '$curr_course_id';";
	$result = mysqli_query($db,$query) or die('Error querying database.');
	$num_of_courses = mysqli_num_rows($result);
	$content_num = $num_of_courses + 1;
	$code = $curr_course_id;
	$con_id = "content" . $content_num;
	$dir_name = $_SESSION["ins_id"];
	$content_title = $_POST['content_name'];
	//echo " title is " . $content_title;
	$insert_sql = "insert into content (course_code, content_id, content_name, link) values('$code','$con_id','$content_title','fff');";
	//$insert_sql = "insert into course (course_code, content_id, content_name, link) values ('$code','$con_id','$content_title','-');";
	$insert_result = mysqli_query($db,$insert_sql) or die('Error entering the content into database.');
	$path = $dir_name . "/" . $code . "/";
	if(is_dir($path)==false) mkdir($path, 0777, true);
	$_POST = array();
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
				if(isset($_GET['variable'])) {
					
					$curr_course_id = $_GET['variable'];
				}
				else{
					echo "failed";
				}
				$curr_course_id = $_GET['variable'];
				
					$query = "select * from content where course_code='$curr_course_id';";
					
					$course_query = mysqli_query($db,$query) or die('Error querying database.');
					
					while ($row = $course_query->fetch_assoc()) {
						
						$crscd = $row["course_code"];
						$cntcd = $row["content_id"];
						echo nl2br("Content name :" . $row["content_name"] . " Content ID :" . $row["content_id"] . "\n\n\n");
						echo "<a href='Content.php?crs=$crscd&cnt=$cntcd'>Link</a>";
						echo nl2br("\n\n\n");

					}
				
				$cont_query = "select * from content where course_code='$curr_course_id';";
				$cont_query_res = mysqli_query($db,$cont_query) or die('Error querying database.');
				
				
			  
			 if($_SESSION['card']=="instructor") echo '<form method="post">
						<input type="hidden" name="add_new_content">
						Input Content Title: <input type="text" name="content_name" required><br>
						<button > Add New Content </button>
					</form>';
			
			/*if($_SESSION["card"]=="instructor") {
				echo '<form action="up_action.php" method="post" enctype="multipart/form-data">

				<input type="file" name="file" size="100000" />
				<input type="hidden" name="course" value="'. $curr_course_id .'" />
				<input type="hidden" name="content" value="'. $curr_con_id .'" />

				<br/>

				<input type="submit" value="Add new content" />

				</form>';
			}*/
			
			?>
			
			
			<!--<object data="test.pdf" type="application/pdf" width="700" height="600">
				alt : <a href="test.pdf">test.pdf</a>
			</object>-->
		  
		</div>
		
		<div>
		</div>
	
	</body>
	
</html>