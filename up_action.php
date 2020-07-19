<?php

	session_start();
	
	$cur_ins = $_SESSION['ins_id'];
	
	$cur_crs = $_POST['course'];
	
	$cur_cnt = $_POST['content'];
	
	 $targetfolder =  $cur_ins ."/" . $cur_crs . "/" . $cur_cnt . "/";
	 
	 echo "target folder vari " . $targetfolder;
	 
	 if(is_dir($targetfolder)==false){
		 mkdir($targetfolder, 0777, true);
		 echo "Made directory " . $targetfolder;
	 }
	 
	 

	 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

	 $ok=1;

	$file_type=$_FILES['file']['type'];

	if ($file_type=="application/pdf") {

	 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

	 {

	 echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
	 //$sql_link_query = "insert into content (clink) values('$targetfolder') where course_code = '$cur_crs' and content_id = '$cur_cnt';";
	 $sql_link_query = "update content set link ='$targetfolder' where course_code = '$cur_crs' and content_id = '$cur_cnt';";
	$db = mysqli_connect('localhost','root','','test_db') or die('Error connecting to MySQL server.');
	 $query_ret = mysqli_query($db,$sql_link_query) or die('Error entering the database.');
	 if($query_ret == false){
		 echo "Failed inserting the link";
	 }

	 }

	 else {

	 echo "Problem uploading file";

	 }
	 
	 header("Location:SingleCourse.php?variable=$cur_crs");

	}

	else {

	 echo "You may only upload PDFs.<br>";

	}

?>