<?php
session_start();
include 'connect.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=1){
		header("Location:student_home.php");
	}
	$firstname=mysqli_real_escape_string($con,$_REQUEST['firstname']);
	$lastname=mysqli_real_escape_string($con,$_REQUEST['lastname']);
	$contact=mysqli_real_escape_string($con,$_REQUEST['contact']);
	$email=mysqli_real_escape_string($con,$_REQUEST['email']);
	$password=mysqli_real_escape_string($con,$_REQUEST['password']);
	$country=mysqli_real_escape_string($con,$_REQUEST['country']);
	$education=mysqli_real_escape_string($con,$_REQUEST['education']);
	$qr=mysqli_query($con,"INSERT into users (firstname,lastname,contact,email,
	password,usertype,created_at,country,education) values ('".$firstname."','".$lastname."','".$contact."','"
	.$email."','".($password)."','2','".date('Y-m-d H:i:s')."','".($country)."','".$education."')");
	if($qr){
		header("Location:add_student.php?success=Added Successfully");
	}
	else{
		header("Location:add_student.php?error=Failed to Add ");
	}
?>
<?php
}
else{
	header("Location:index.php?error=UnAuthorized Access");
}