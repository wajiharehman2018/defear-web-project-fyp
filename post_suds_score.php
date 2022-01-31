<?php
session_start();
include 'connect.php'; 
// echo isset($_COOKIE['SessionStatus']) . ' '.$_COOKIE['SessionStatus'];
// if (isset($_COOKIE['SessionStatus']))
//  {
//     echo isset($_COOKIE['SessionStatus']) . ' '.$_COOKIE['SessionStatus'];
//     if(isset($_SESSION['cbt_session']['session_id'])){        
//         $session_id = $_SESSION['cbt_session']['session_id'];
//         echo $session_id;
//         $query = "update session set status = 0 where session_id = $session_id";
//         $_SESSION['cbt_session']['session_id'] = 0; 
//         echo $query;
//         $execute_query = mysqli_query($con,$query);
//         if ($execute_query) 
//         {
//             header("Location:post_suds_score.php");
//         }
//     }
// 	// $fn = $_POST['firstname'];
// 	// $ln = $_POST['lastname'];
// 	// $cont = $_POST['contact'];
// 	// $email = $_POST['email'];
// 	// $country = $_POST['country'];
// 	// $education = $_POST['education'];

// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    <title>DeFear - Post SUDS Score Submission</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light">
        <a class="navbar-brand" href="#"><img src="images/logo_defear.png" width="125" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="therapist_home.php">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Meditation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reports</a>
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
                <img src="images/logo_defear.png" class="rounded-circle user-profile ml-2" alt="User Profile Image"
                    height="50" width="50">
            </div>
            <div class="d-block mt-2 mr-1">
                <a href="logout.php" class="btn btn-purple btn-block" style="font-size: 15px;">Logout</a>
            </div>

        </div>
    </nav>
    <div class="container">
        <form action="end_session.php" method="post">
            <div class="card mt-5 border-5 pt-2 active pb-20 px-3 text-center">
                <h3 class="mt-3 text-secondary">Rate the SUDS score for the anxiety level of client </h3>

                <div class="card-body text-center">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <input type="hidden" name="client_id" value="<?php echo("$clientid") ?>">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="post_suds_score"
                                    id="flexRadioDefault1" value="0">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    0
                                </label>
                            </div>&nbsp&nbsp&nbsp&nbsp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="post_suds_score"
                                    id="flexRadioDefault1" value="1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    1
                                </label>
                            </div>&nbsp&nbsp&nbsp&nbsp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="post_suds_score"
                                    id="flexRadioDefault2" value="2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    2
                                </label>
                            </div>&nbsp&nbsp&nbsp&nbsp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="post_suds_score"
                                    id="flexRadioDefault2" value="3">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    3
                                </label>
                            </div>&nbsp&nbsp&nbsp&nbsp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="post_suds_score"
                                    id="flexRadioDefault2" value="4">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    4
                                </label>
                            </div>&nbsp&nbsp&nbsp&nbsp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="post_suds_score"
                                    id="flexRadioDefault2" value="5">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    5
                                </label>
                            </div>&nbsp&nbsp&nbsp&nbsp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="post_suds_score"
                                    id="flexRadioDefault2" value="6">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    6
                                </label>
                            </div>&nbsp&nbsp&nbsp&nbsp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="post_suds_score"
                                    id="flexRadioDefault2" value="7">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    7
                                </label>
                            </div>&nbsp&nbsp&nbsp&nbsp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="post_suds_score"
                                    id="flexRadioDefault2" value="8">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    8
                                </label>
                            </div>&nbsp&nbsp&nbsp&nbsp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="post_suds_score"
                                    id="flexRadioDefault2" value="9">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    9
                                </label>
                            </div>&nbsp&nbsp&nbsp&nbsp
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="post_suds_score"
                                    id="flexRadioDefault2" value="10">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    10
                                </label>
                            </div>
                        </div>
                        <div class="text-center color-red">
                            <?php if(isset($_SESSION['errors']['pre_suds_err'])) echo '<p class="">' . $_SESSION['errors']['pre_suds_err'] . '</p>'; ?>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-6 form-group mb-2 mt-1">
                                <button type="submit" name="end_session_submit" class="btn btn-purple"
                                    style="margin-top: 10%; ">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>