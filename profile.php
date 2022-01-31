<?php
session_start();
error_reporting(0);
include 'connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>DeFear - User Profile</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    .card-footer h5 {
        color: black;
    }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />

    <!-- Custom styles for card -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
</head>
</head>

<body>

    <div>

        <!-- Sidebar-->

        <!-- Page content wrapper-->
        <div>
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
                        <li class="nav-item">



                            <a class="nav-link" href="index.php" style="font-size: 17px">Home</a>


                        </li>




                    </ul>
                </div>
                <div class="navbar-nav pull-right">


                    <div class="username-greeting mr-4">


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
                        <img src="images/logo_defear.png" class="rounded-circle user-profile ml-2"
                            alt="User Profile Image" height="50" width="50">
                    </div>
                    <div class="d-block mt-1 mr-1">
                        <a href="logout.php" class="btn btn-purple btn-block" style="font-size: 15px;">Logout</a>
                    </div>

                </div>

            </nav>

            <!-- Top navigation-->

            <!-- Page Content-->
            <div class="container" style="margin-left: 240px">
                <div class="card mt-5 border-5 pt-2 active pb-20 px-3">
                    <div class="card-body ">
                        <div class="col-12 ">
                            <i class="bi bi-person-circle" style="margin-left: 45%;"></i>




                            <hr>
                            <?php 
                                if(isset($_GET['id']))
                                {
                                    
                                    $id = $_GET['id'];

                                    $query = "SELECT * FROM users WHERE id='$id' ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>



                            <h2 style="align-content: left;">
                                <b><?php echo $row['firstname']." ".$row['lastname'];  ?></b>
                            </h2>
                            <br>
                            <div class="card-footer col-12 px-3">
                                <div class="row">
                                    <h5 style="align-content: left;"><i
                                            style='font-size:24px; align-items:center; color:black; '
                                            class='fas fa-phone-alt'></i>&nbsp&nbsp&nbsp&nbsp
                                        <?php echo $row['contact']; ?></h5><br><br>
                                    <h5 style="align-content: left;"> <i style='font-size:24px; align-items:center; '
                                            class='fas fa-graduation-cap'></i>&nbsp&nbsp&nbsp&nbsp
                                        <?php echo $row['education']; ?></h5><br><br>
                                    <h5 style="align-content: left;"><i style='font-size:24px; align-items:center; '
                                            class='fas fa-location-arrow'></i>&nbsp&nbsp&nbsp&nbsp
                                        <?php echo $row['country']; ?></h5><br><br>
                                    <h5 style="align-content: left;"><i style='font-size:24px; align-items:center; '
                                            class='fas fa-at'></i>&nbsp&nbsp&nbsp&nbsp <?php echo $row['email']; ?></h5>
                                </div>
                            </div>
                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                                
                            ?>



                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!--page content end here-->


    </div>

    <script src="js/scripts.js"></script>

</body>

</html>