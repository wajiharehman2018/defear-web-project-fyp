<?php
session_start();
include 'connect.php';

if (isset($_POST['submit']))	
 {	
	$clientid = $_POST['client_id'];
	$fn = $_POST['firstname'];
	$ln = $_POST['lastname'];
	$cont = $_POST['contact'];
	$dob = $_POST['dateofbirth'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];

	$query = "update clients set firstname='$fn' , lastname='$ln' , contact='$cont' , dateofbirth='$dob' , gender='$gender' , address='$address' where client_id = $clientid";

	$execute_query = mysqli_query($con,$query);
	if ($execute_query) 
	{
		header("Location:therapist_home.php");
	}
}
?>
