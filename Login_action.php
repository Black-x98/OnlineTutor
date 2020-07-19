 <?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
 $db = mysqli_connect('localhost','root','','test_db')
 or die('Error connecting to MySQL server.');

$username = $_REQUEST['username'];
$usertype = $_REQUEST['usertype'];
$psw= $_REQUEST['psw'];


if($usertype == "student") $query = "SELECT * FROM student where std_id = '$username' and password = '$psw'";
else if($usertype == "instructor") $query = "SELECT * FROM instructor where ins_id = '$username' and password = '$psw'";
$login = mysqli_query($db,$query) or die('Error querying database.');

if($login === FALSE) { 
	echo "Error in query.";
}
if($login==TRUE){
	    $row = mysqli_fetch_array($login);

			if($usertype=="student"){
				if($row['std_id']==NULL){
				echo "Log in failed!!";
				header("Location:Login.php");
				}
				else{
					echo "You are now logged in as a student!";
					$_SESSION["logged_in"] = true;
					$_SESSION["std_id"] = $row['std_id'];
					$_SESSION["name"] = $row['name'];
					$_SESSION["card"] = "student";
					
					header("Location:StudentProfile.php");
				}
			}
				
			else if($usertype=="instructor"){
				if($row['ins_id']==NULL){
					echo "Log in failed!!";
					header("Location:Login.php");
				}
				else{
					echo "You are now logged in as an instructor!";
					$_SESSION["logged_in"] = true;
					$_SESSION["ins_id"] = $row['ins_id'];
					$_SESSION["name"] = $row['name'];
					$_SESSION["card"] = "instructor";
					
					header("Location:InstructorProfile.php");
				}
			}
		}

?>

</body>
</html> 