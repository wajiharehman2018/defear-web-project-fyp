<?php
session_start();
include 'connect.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=2){
		header("Location:therapist_home.php");
	}
}
?>

<?php
error_reporting(0);
$clientid = $_GET['client_id'];
$fn = $_GET['fn'];
$ln = $_GET['ln'];
$cont = $_GET['cont'];
$dob = $_GET['dob'];
$gender = $_GET['gender'];
$address = $_GET['address'];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Therapist </title>
    <?php include 'css.php'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    <title>DeFear - Therapist Panel</title>
</head>

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
                <!-- <li class="nav-item">
                 
           
				
                    <a class="nav-link" href="therapist_home.php" style="font-size: 17px">Home</a>
                 

                </li> -->

                <li class="nav-item">

                    <a href="add_client.php" class="btn btn-dark" style="margin-left:785px; font-size: 15px">Add
                        Client</a>
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






    <form action="edit_client_post.php" method="post">
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
            <div class="row">
                <h2 style="margin:15px;" class="text-center">Edit Client</h2>
            </div>
            <input type="hidden" name="client_id" value="<?php echo("$clientid") ?>">
            <div class="row">
                <div class="col-lg-12 form-group">
                    <input type="text" name="firstname" value="<?php echo("$fn") ?>" placeholder="First Name"
                        required="required" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 form-group">
                    <input type="text" name="lastname" value="<?php echo("$ln") ?>" placeholder="Last Name"
                        required="required" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 form-group">
                    <input type="tel" name="contact" value="<?php echo("$cont") ?>" placeholder="Contact"
                        required="required" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 form-group">
                    <input type="date" name="dateofbirth" value="<?php echo("$dob") ?>" placeholder="Date of Birth"
                        required="required" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 form-group">
                    <input list="gender" name="gender" value="<?php echo("$gender") ?>" placeholder="Gender"
                        required="required" class="form-control">
                    <datalist id="gender">
                        <option value="Male">
                        <option value="Female">
                    </datalist>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 form-group">
                    <input type="text" name="address" value="<?php echo("$address") ?>" placeholder="Education"
                        required="required" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 form-group">
                    <button type="submit" name="submit" id="submit" class="btn btn-success btn-block"> Edit
                        Client</button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>