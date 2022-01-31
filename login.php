<?php
session_start();
include 'connect.php';
if(isset($_REQUEST['email']) && isset($_REQUEST['password'])){
	//mysqli real escape prevent from sql injection which filter the user input
	$email=mysqli_real_escape_string($con,$_REQUEST['email']);
	$password=mysqli_real_escape_string($con,$_REQUEST['password']);
	$qr=mysqli_query($con,"select * from users where email='".$email."' and password='".($password)."'");
	if(mysqli_num_rows($qr)>0){
		$data=mysqli_fetch_assoc($qr);
		$_SESSION['user_data']=$data;
		$_SESSION['firstname'] = ucfirst($data['firstname']);
		$_SESSION['lastname'] = ucfirst($data['lastname']);
		$_SESSION['contact'] = $data['contact'];
		$_SESSION['education'] = $data['education'];
		$_SESSION['country'] = $data['country'];
		if($data['usertype']==1){
			$_SESSION['email']=$email;
			header("Location:teacher_home.php");	
		}
		else{
			$_SESSION['email']=$email;
			header("Location:therapist_home.php");
		}
	}
	else{
		header("Location:index.php?error=Invalid Login Details");		
	}
}
else{
	header("Location:index.php?error=Please Enter Email and Password");
}