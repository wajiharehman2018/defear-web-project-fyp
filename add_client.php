<?php
session_start();
include 'connect.php';
error_reporting(1);

if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=2){
		header("Location:therapist_home.php");
	}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Client</title>
    <?php include 'css.php'; //yeh wali file khol do plis no?>
    <title>Therapist Home</title>
    <?php include 'css.php'; ?>
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/loginfrom.css">

    <title>DeFear - Therapist Panel</title>
</head>

<body>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-md bg-white navbar-light">
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
                    <a class="nav-link" href="therapist_home.php" style="font-size: 17px">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="font-size: 17px">Meditation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="font-size: 17px">Reports</a>
                </li>
                <!-- <li class="nav-item">

                    <a href="add_client.php" class="btn btn-dark" style="margin-left:785px; font-size: 15px">Add
                        Client</a>
                </li> -->
<!-- 
                <li class="nav-item">

                </li> -->

                <!-- 

                <a href="logout.php" class="btn btn-purple btn-block"
                    style="margin-left:800px; font-size: 15px;">Logout</a> -->

            </ul>
        </div>
        

    </nav>

    <div class="registration-form">

        <form action="add_client_post.php" method="post">
            <div class="container">

                <div class="row">
                    <?php if(isset($_REQUEST['error'])){ ?>
                    <div class="col-lg-12">
                        <span class="alert alert-danger"
                            style="display: block;"><?php echo $_REQUEST['error']; ?></span>
                    </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <?php if(isset($_REQUEST['success'])){ ?>
                    <div class="col-lg-12">
                        <span class="alert alert-success"
                            style="display: block;"><?php echo $_REQUEST['success']; ?></span>
                    </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <h2 style="margin:15px;" class="text-center">Add Client</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <input type="text" name="firstname" placeholder="First Name" required="required"
                            class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <input type="text" name="lastname" placeholder="Last Name" required="required"
                            class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <input type="tel" min="11" max="20" name="contact" placeholder="Contact" required="required"
                            class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <input type="date" name="dateofbirth" placeholder="Date of Birth" required="required"
                            class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <input list="gender" name="gender" placeholder="Gender" required="required"
                            class="form-control">
                        <datalist id="gender">
                            <option value="Male">
                            <option value="Female">
                        </datalist>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 form-group">
                        <input type="text" name="address" placeholder="Address" required="required"
                            class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 form-group">
                        <button type="submit" class="btn btn-dark btn-block"> Add Client</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


</body>

</html>
<?php
}
else{
	header("Location:index.php?error=UnAuthorized Access");
}