<?php
session_start();
include 'connect.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=1){
		header("Location:student_home.php");
	}
}
?>

<?php

error_reporting(0);

$id = $_GET['id'];
$fn = $_GET['fn'];
$ln = $_GET['ln'];
$cont = $_GET['cont'];
$email = $_GET['email'];
$country = $_GET['country'];
$education = $_GET['education'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Therapist </title>
	<?php include 'css.php'; ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    <title>DeFear - Admin Panel</title>






</head>


<style type="text/css">
	<style type="text/css">
	body{
    background-color: #dee9ff;
}

.registration-form{
	padding: 20px 0;
}

.registration-form form{
    background-color: #fff;
    max-width: 700px;
    margin: auto;
    padding: 40px 70px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);

}

.registration-form .form-icon{
	text-align: center;
    background-color:#9C54A8;
    border-radius: 50%;
    font-size: 40px;
    color: white;
    width: 100px;
    height: 100px;
    margin: auto;
    margin-bottom: 50px;
    line-height: 100px;
}

.registration-form .item{
	border-radius: 20px;
    margin-bottom: 25px;
    padding: 10px 20px;
}

.registration-form .create-account{
    border-radius: 30px;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    background-color: #5791ff;
    border: none;
    color: white;
    margin-top: 20px;
}



.registration-form .social-icons a:hover{
    text-decoration: none;
    opacity: 0.6;
}

@media (max-width: 576px) {
    .registration-form form{
        padding: 50px 20px;
    }

    .registration-form .form-icon{
        width: 70px;
        height: 70px;
        font-size: 30px;
        line-height: 70px;
    }
}
</style>
</style>
<body style="background-color: #23272B">



	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-md bg-light navbar-light">
        <a class="navbar-brand" href="#"><img src="images/logo_defear.png" width="125" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>




        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                 
           
				
                    <a class="nav-link" href="teacher_home.php" style="font-size: 17px">Home</a>
                 

                </li>

  <li class="nav-item">
                  
                    <a href="add_student.php" class="btn btn-dark" style="margin-left:785px; font-size: 15px">Add Therapist</a>
                </li>

  <li class="nav-item">
                  
                    <a href="logout.php" class="btn btn-dark" style="margin-left:800px; font-size: 15px">Logout</a>
                </li>

              
              
             
            </ul>
        </div>
        <div class="float-right">


            <div class="username-greeting mr-1">


                Hello,
                <?php 
                    $logged = $_SESSION['user_data']['id'];
                    $user_query = "SELECT * from users where id = ".$logged;
                    $result = mysqli_query($con,$user_query);
                    if($result){
                        $row=mysqli_fetch_assoc($result);
                        echo trim($row['firstname'])."!";
                    }
                 ?>
                <img src="images/logo_defear.png" class="rounded-circle user-profile ml-2" alt="User Profile Image"
                    height="50" width="50">
            </div>
        </div>

    </nav>
 
	<form action="edit_therapist_post.php" method="post">
	<div class="container">
		
		<div class="row">
   		<?php if(isset($_REQUEST['error'])){ ?>
   		<div class="col-lg-12">
   			<span class="alert alert-danger" style="display: block;"><?php echo $_REQUEST['error']; ?></span>
   		</div>
	   	<?php } ?>
	   	</div>
	   	<div class="row">
   		<?php if(isset($_REQUEST['success'])){ ?>
   		<div class="col-lg-12">
   			<span class="alert alert-success" style="display: block;"><?php echo $_REQUEST['success']; ?></span>
   		</div>
	   	<?php } ?>
	   	</div>



</form>




		<div class="registration-form">
			<h2>Edit Therapist</h2>
		</div>
		<input type="hidden" name="id" value="<?php echo("$id") ?>">
		<div class="row">
			<div class="col-lg-12 form-group">
				<input type="text" name="firstname" value="<?php echo("$fn") ?>" placeholder="First Name" required="required" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 form-group">
				<input type="text" name="lastname" value="<?php echo("$ln") ?>" placeholder="Last Name" required="required" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 form-group">
				<input type="tel" name="contact" value="<?php echo("$cont") ?>" placeholder="Contact" required="required" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 form-group">
				<input type="email" name="email" value="<?php echo("$email") ?>" placeholder="Email" required="required" class="form-control">
			</div>
		</div>
		 <div class="row">
			<div class="col-lg-12 form-group">
				<input type="text" name="country" value="<?php echo("$country") ?>" placeholder="Country" required="required" class="form-control">
			</div>
		</div>
		 <div class="row">
			<div class="col-lg-12 form-group">
				<input type="text" name="education" value="<?php echo("$education") ?>" placeholder="Education" required="required" class="form-control">
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 form-group">
				<button type="submit" name="submit" id="submit" class="btn btn-success btn-block"> Edit Therapist</button>
			</div>
		</div>
	</div>
	
</body>
</html>

