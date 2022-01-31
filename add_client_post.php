<?php
session_start();
include 'connect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=2){
		header("Location:therapist_home.php");
	}
	$fn=mysqli_real_escape_string($con,$_REQUEST['firstname']);
	$ln=mysqli_real_escape_string($con,$_REQUEST['lastname']);
	$cont=mysqli_real_escape_string($con,$_REQUEST['contact']);
	$dob=mysqli_real_escape_string($con,$_REQUEST['dateofbirth']);
	$gender=mysqli_real_escape_string($con,$_REQUEST['gender']);
	$address=mysqli_real_escape_string($con,$_REQUEST['address']);
	$logged = $_SESSION['user_data']['id'];
	$qr=mysqli_query($con,"INSERT into clients ( firstname,lastname,contact,dateofbirth,gender,usertype,address,therapist_fk) values ('".$fn."','".$ln."','".$cont."','".$dob."','".$gender."','3','".$address."',".$logged.")");
	if($qr){
		header("Location:therapist_home.php?success=Added Successfully");
	}
	else{
		
		header("Location:add_client.php?error=".$con->error);
		echo $con->error;
	}
}
else{
	header("Location:index.php?error=UnAuthorized Access");
}
?>