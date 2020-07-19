<?php
session_start();

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
		
		
		<div class="row">
		    <div class="tab">
			<?php 
			$crs = $_GET['crs'];
			$cnt = $_GET['cnt'];
			//echo $crs;
			//echo $cnt;
			//if($_SESSION['card']=="instructor"){
				//$curr_ins_id = $_SESSION['ins_id'];
				$db = mysqli_connect('localhost','root','','test_db')
				or die('Error connecting to MySQL server.');
			$theq = "select * from content natural join course where course_code = '$crs' and content_id = '$cnt';";
			
			$ret_query = mysqli_query($db,$theq) or die('Error querying database.');
				
					$row = $ret_query->fetch_assoc();
					
					$curr_ins_id = $row['ins_id'];
					
					
					while ($row = $ret_query->fetch_assoc()) {
						
						$course_link = $row['link'];
						$crscd = $row["course_code"];
						
						echo nl2br("\n\n\n" . $row["content_id"] . " " . $row["content_name"] ." "  );
						echo "<a href='SingleCourse.php?variable="."$crscd'>Link</a>";
							
					}
					echo nl2br("\n\n\n");
			//}
				if($_SESSION["card"]=="instructor") {
					echo '<form action="up_action.php" method="post" enctype="multipart/form-data">

					<input type="file" name="file" size="100000" />
					<input type="hidden" name="course" value="'. $_GET['crs'] .'" />
					<input type="hidden" name="content" value="'. $_GET['cnt'] .'" />

					<br/>

					<input type="submit" value="Upload Reading Material" />

					</form>';
				}
			  
					?>
		    </div>
			
			<?php
			
			
			 $db = mysqli_connect('localhost','root','','test_db')
				or die('Error connecting to MySQL server.');
			$theq = "select * from content natural join course where course_code = '$crs' and content_id = '$cnt';";
			
			$ret_query = mysqli_query($db,$theq) or die('Error querying database.');
			$therow = $ret_query->fetch_assoc();
			$the_link = $therow['link'];
			
			//echo "This is the link " . $the_link;
			
			
			
			/*if ($handle = opendir('.')) {

				while (false !== ($entry = readdir($the_link))) {

					if ($entry != "." && $entry != "..") {

						echo "$entry\n";
					}
				}

				closedir($handle);
			}*/		
			echo '<object data="'.$the_link.'" type="application/pdf" width=60% height="600">
				alt : <a href="'.$the_link.'">'.$the_link.'</a>
			</object>';
			
		  
		  ?>
		
		
	</body>
	
</html>