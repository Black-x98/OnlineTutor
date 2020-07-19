<?php
 $db = mysqli_connect('localhost','root','','test_db')
 or die('Error connecting to MySQL server.');
?>

<?php

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$usertype = $_REQUEST['usertype'];
$dob = $_REQUEST['dob'];
$user_name = $_REQUEST['username'];
$psw= $_REQUEST['psw'];

$query = "";

echo $usertype;

if($usertype == "student") $query = "insert into student (std_id, password, name, email, dob) values('$user_name','$psw','$name','$email','$dob')";
else if($usertype == "instructor") $query = "insert into instructor (ins_id, password, name, email, dob) values('$user_name','$psw','$name','$email','$dob')";

$ret_query = mysqli_query($db,$query) or die('Error querying database.');
if($ret_query==true){	
					mkdir($user_name);
					echo "directory made when signing up.";
				}

header("Location:StudentProfile.php");
    
?>
