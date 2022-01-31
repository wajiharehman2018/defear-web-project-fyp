<?php
session_start();
error_reporting(0);
include 'connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>User Profile</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Custom styles for card -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
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
    <div class="container phobia-selection-container">
        <!-- <div class="btn btn-purple">
            <a href="SocialPhobiaScene:">Play</a>
        </div> -->
        <div class="phobia-selection-heading">
            SELECT A PHOBIA
        </div>
        <div class="row pt-4">
            <div class="phobia-selection col-12 col-md-4 col-sm-12 mb-3">
                <div class="card phobia-card text-center">
                    <div class="rounded-wrapper m-3 mx-auto display-4"><i class="fa fa-level-up"></i></div>
                    <div class="phobia-details">
                        <div class="phobia-title">Acrophobia</div>
                        <div class="phobia-description">Fear of heights</div>
                    </div>
                </div>
            </div>
            <div class="phobia-selection col-12 col-md-4 col-sm-12 mb-3">
                <div class="card phobia-card text-center">
                    <div class="rounded-wrapper m-3 mx-auto display-4"><i class="fa fa-comments-o"></i></div>
                    <div class="phobia-details">
                        <div class="phobia-title">Social Phobia</div>
                        <div class="phobia-description">Fear of social situations</div>
                    </div>
                </div>
            </div>
            <div class="phobia-selection col-12 col-md-4 col-sm-12">
                <div class="card phobia-card text-center">
                    <div class="rounded-wrapper m-3 mx-auto display-4"><i class="fa fa-bug"></i></div>
                    <div class="phobia-details">
                        <div class="phobia-title">Entomophobia</div>
                        <div class="phobia-description">Fear of insects</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center py-4">
                <p class="phobia-error"></p>
                <div class="btn btn-purple" id="btn-next-1">
                    <span>Next</span> <span> <i class="fa fa-arrow-right"></i></span>
                </div>

            </div>
        </div>

    </div>

    <div class="container phobia-level-container">
        <div class="row">
            <div class="col-12">
                <div class="phobia-selection-heading">
                    SELECT A LEVEL
                </div>
            </div>
        </div>
        <div class="row">
            <div class="phobia-level-selection col-4 col-md-4">
                <div class="card phobia-level-card text-center py-4">
                    <p class="phobia-selection-level-number vertical-center display-4">1</p>
                </div>
            </div>
            <div class="phobia-level-selection col-4 col-md-4">
                <div class="card phobia-level-card text-center py-4">
                    <p class="phobia-selection-level-number vertical-center display-4">2</p>
                </div>
            </div>
            <div class="phobia-level-selection col-4 col-md-4">
                <div class="card phobia-level-card text-center py-4">
                    <p class="phobia-selection-level-number vertical-center display-4">3</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center py-4">
                <p class="phobia-level-error"></p>
                <div class="btn btn-purple" id="btn-back-1">
                    <span>Back</span> <span> <i class="fa fa-arrow-left"></i></span>
                </div>
                <div class="btn btn-purple" id="btn-next-2">
                    <span>Next</span> <span> <i class="fa fa-arrow-right"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container phobia-milestone-container">
        <div class="row">
            <div class="col-12">
                <div class="phobia-selection-heading">
                    SELECT A MILESTONE
                </div>
            </div>
        </div>
        <div class="row">
            <div class="phobia-milestone-selection col-4 col-md-4">
                <div class="card phobia-milestone-card text-center py-4">
                    <p class="phobia-selection-milestone vertical-center display-4">A</p>
                </div>
            </div>
            <div class="phobia-milestone-selection col-4 col-md-4">
                <div class="card phobia-milestone-card text-center py-4">
                    <p class="phobia-selection-milestone vertical-center display-4">B</p>
                </div>
            </div>
            <div class="phobia-milestone-selection col-4 col-md-4">
                <div class="card phobia-milestone-card text-center py-4">
                    <p class="phobia-selection-milestone vertical-center display-4">C</p>
                </div>
            </div>
        </div>
        <form method="post">
            <div class="row">
                <div class="col-12 text-center py-4">
                    <p class="phobia-milestone-error"></p>
                    <div class="btn btn-purple" id="btn-back-2">
                        <span>Back</span> <span> <i class="fa fa-arrow-left"></i></span>
                    </div>
                    <div class="btn btn-purple" id="btn-open-scenario" name="open_scene">
                        <!-- <a href="scenes/social phobia/1/A/Testing Scenes.exe" download>Start</a> -->
                        <!-- <span>Start</span> <span> <i class=""></i></span> --> 
                        <a id="btnStartScenario">Download Scenario</a>
                    </div>
                    <div class="btn btn-purple" id="btn-start-session" name="start_session">
                        <!-- <a href="scenes/social phobia/1/A/Testing Scenes.exe" download>Start</a> -->
                        <!-- <span>Start</span> <span> <i class=""></i></span> --> 
                        <a id="btnStartSession">Start</a>
                    </div>
                    <!-- <div class="btn btn-purple" id="btn-next-1">
                    <a href="phobiascenariotest:" id="btn-open-scenario">Test</a>
                </div> -->
                </div>
            </div>
        </form>

    </div>
    </div>

    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $('.phobia-level-container').hide();
        $('.phobia-milestone-container').hide();
        var phobia = "";
        $(".phobia-selection").bind("click", function(e) {
            $(".phobia-selection").find(".phobia-card").removeClass("selected-phobia");
            phobia = $(e.target).find('.phobia-title').text();
            $(e.target).toggleClass("selected-phobia");
        });
        $('#btn-next-1').click(function(e) {
            if (phobia != "") {
                $('.phobia-error').text('');
                $('.phobia-selection-container').hide();
                $('.phobia-level-container').show();
            } else {
                $('.phobia-error').text('Please select a phobia');
                $('.phobia-error').css('color', 'red');
            }
        });

        var phobia_level = 0;
        $(".phobia-level-selection").bind("click", function(e) {
            $(".phobia-level-selection").find(".phobia-level-card").removeClass("selected-phobia");
            phobia_level = $(e.target).find('.phobia-selection-level-number').text();
            $(e.target).toggleClass("selected-phobia");
        });
        $('#btn-next-2').click(function(e) {
            if (phobia_level != 0 && phobia_level != "" ) {
                $('.phobia-level-error').text('');
                $('.phobia-level-container').hide(); 
                $('.phobia-milestone-container').show();
            } else {
                $('.phobia-level-error').text('Please select a phobia level');
                $('.phobia-level-error').css('color', 'red');
            }
        });
        $('#btn-back-1').click(function(e) {
            $('.phobia-level-container').hide();
            $('.phobia-selection-container').show();
        });

        var phobia_milestone = "";
        $(".phobia-milestone-selection").bind("click", function(e) {
            $(".phobia-milestone-selection").find(".phobia-milestone-card").removeClass(
                "selected-phobia");
            phobia_milestone = $(e.target).find('.phobia-selection-milestone').text();
            $(e.target).toggleClass("selected-phobia");
        });

        $('#btn-open-scenario').click(function(e) {
            if (phobia_milestone != "") {
                $('.phobia-milestone-error').text('');
                openScenario(phobia, phobia_level, phobia_milestone);
            } else {
                $('.phobia-milestone-error').text('Please select a phobia milestone');
                $('.phobia-milestone-error').css('color', 'red');
            }
        });

        $('#btn-start-session').click(function(e) {
            if (phobia_milestone != "") {
                $('.phobia-milestone-error').text('');
                startSession(phobia, phobia_level, phobia_milestone);
            } else {
                $('.phobia-milestone-error').text('Please select a phobia milestone');
                $('.phobia-milestone-error').css('color', 'red');
            }
        });

        $('#btn-back-2').click(function(e) {
            $('.phobia-milestone-container').hide();
            $('.phobia-level-container').show();
        });

    });
    </script>
    <script src="js/vret_app.js"></script>
</body>

</html>