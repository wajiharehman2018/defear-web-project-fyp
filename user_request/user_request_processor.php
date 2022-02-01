<?php
include '../connect.php';  
$input = json_decode($_POST["input"]);
$fn=mysqli_real_escape_string($con,$input->fname);
$ln=mysqli_real_escape_string($con,$input->lname);
$cont=mysqli_real_escape_string($con,$input->contact);
$email=mysqli_real_escape_string($con,$input->email);
$password=mysqli_real_escape_string($con,$input->password);
$country=mysqli_real_escape_string($con,$input->country);
$education = mysqli_real_escape_string($con,$input->education); 
$date_creation = date('Y-m-d H:i:s');
$qr=mysqli_query($con,"INSERT into new_user_requests ( email,password,firstname,lastname,contact,country,education,created_at,approved) 
values ('".$email."','".$password."','".$fn."','".$ln."','".$cont."','".$country."','".$education."','".$date_creation."',0)");
if($qr){
	echo "Added Successfully";
}
else{
	echo "Something went wrong. Please try again.";
	echo $con->error;
} 
?>