<?php 

ob_start();
session_start();

include 'connect.php';

if (!empty($_FILES)) {

	$uploads_dir = '../dimg/studentimages';
	@$tmp_name = $_FILES['file']["tmp_name"];
	@$name = $_FILES['file']["name"];
	$uniquenumber1=rand(20000,32000);
	$uniquenumber2=rand(20000,32000);
	$uniquenumber3=rand(20000,32000);
	$uniquenumber4=rand(20000,32000);

	$uniquename=$uniquenumber1.$uniquenumber2.$uniquenumber3.$uniquenumber4;
	// $refimgpath=substr($uploads_dir, 6)."/".$uniquename.$name;
	$refimgpath=$uploads_dir."/".$uniquename.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$uniquename$name");

	$student_id=$_POST['student_number'];

	$kaydet=$db->prepare("INSERT INTO student_image SET
		student_image_imagepath=:student_image_imagepath,
		student_image_student_number=:student_image_student_number");
	$insert=$kaydet->execute(array(
		'student_image_imagepath' => $refimgpath,
		'student_image_student_number' => $student_id
	));




}


?>
