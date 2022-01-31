<?php
session_start();
error_reporting(0);
include 'connect.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=2){
		header("Location:therapist_home.php");
	}
}
?>

<?php
$clientid = $_GET['client_id'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SUDS Score</title>
    <!-- Custom styles for card -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    <div class="container-fluid vh-100 bg-light">
        <nav class="navbar navbar-expand-md bg-white navbar-light">
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
        <div style="background-color:#FFEFFF0;">
            <div class="container">
                <form action="suds_score_post.php?client_id=<?php echo $_GET['client_id']; ?>" method="post">
                    <div class="card mt-5 border-5 pt-2 active pb-20 px-3 text-center">
                        <div class="card-body text-center">
                            <div class="form-group form-inline">
                                <label for="session_title">Session Title</label>
                                <input type="text" name="session_title" class="form-control mx-4 col-6"
                                    value="<?php if(isset($_POST['session_title'])){ echo $_POST['session_title'];} ?>">

                                </div>
                            <div class="text-center  text-danger mt-3">
                                <?php if(isset($_SESSION['errors']['session_title_err'])) echo '<p class="">' . $_SESSION['errors']['session_title_err'] . '</p>'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-5 border-5 pt-2 active pb-20 px-3 text-center">
                        <h3 class="text-secondary mt-3">Rate the SUDS score for the anxiety level of client </h3>
                        <div class="card-body text-center">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <input type="hidden" name="client_id" value="<?php echo("$clientid") ?>">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="suds_score"
                                            id="flexRadioDefault1" value="0">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            0
                                        </label>
                                    </div>&nbsp&nbsp&nbsp&nbsp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="suds_score"
                                            id="flexRadioDefault1" value="1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            1
                                        </label>
                                    </div>&nbsp&nbsp&nbsp&nbsp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="suds_score"
                                            id="flexRadioDefault2" value="2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            2
                                        </label>
                                    </div>&nbsp&nbsp&nbsp&nbsp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="suds_score"
                                            id="flexRadioDefault2" value="3">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            3
                                        </label>
                                    </div>&nbsp&nbsp&nbsp&nbsp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="suds_score"
                                            id="flexRadioDefault2" value="4">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            4
                                        </label>
                                    </div>&nbsp&nbsp&nbsp&nbsp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="suds_score"
                                            id="flexRadioDefault2" value="5">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            5
                                        </label>
                                    </div>&nbsp&nbsp&nbsp&nbsp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="suds_score"
                                            id="flexRadioDefault2" value="6">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            6
                                        </label>
                                    </div>&nbsp&nbsp&nbsp&nbsp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="suds_score"
                                            id="flexRadioDefault2" value="7">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            7
                                        </label>
                                    </div>&nbsp&nbsp&nbsp&nbsp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="suds_score"
                                            id="flexRadioDefault2" value="8">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            8
                                        </label>
                                    </div>&nbsp&nbsp&nbsp&nbsp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="suds_score"
                                            id="flexRadioDefault2" value="9">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            9
                                        </label>
                                    </div>&nbsp&nbsp&nbsp&nbsp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="suds_score"
                                            id="flexRadioDefault2" value="10">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            10
                                        </label>
                                    </div>
                                </div>
                                <div class="text-center  text-danger mt-3">
                                    <?php if(isset($_SESSION['errors']['pre_suds_err'])) echo '<p class="">' . $_SESSION['errors']['pre_suds_err'] . '</p>'; ?>
                                </div>
                                <div class="justify-content-center">
                                    <!-- <div class="dropdown mt-4">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Session Type
                                </button>
                                <div class="dropdown-menu sessiontype">
										<a class="dropdown-item" value="cbt" href="#">CBT</li>
										<a class="dropdown-item" value="vret" href="#">VRET</li>								
                                </div>
                            </div> -->
                                    <div class="text-secondary font-weight-bold">Session Type</div>
                                    <div class="btn-group mt-3">
                                        <a class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" href="#">
                                            <?php 
										if(isset($_SESSION['session_type'])) 
											echo $_SESSION['session_type']; 
										else echo "Select Session Type"; ?>
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item">CBT</li>
                                            <li class="dropdown-item">VRET</li>
                                        </ul>
                                    </div>
                                    <input type='hidden' name='session_type'>
                                    <script>
                                    $(".dropdown-menu li").click(function() {
                                        var selText = $(this).text();
                                        $(this).parents('.btn-group').find('.dropdown-toggle').html(selText +
                                            ' <span class="caret"></span>');
                                        $("input[name='session_type']").val(selText);
                                        var val = $("input[name='session_type'").val();
                                        console.log(val);
                                    });
                                    </script>
                                    <div class="text-center text-danger mt-3">
                                        <?php if(isset($_SESSION['errors']['session_type_err'])) echo '<p class="">' . $_SESSION['errors']['session_type_err'] . '</p>'; ?>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 form-group mb-2 mt-1">
                                        <!-- <a class="btn-lg btn-purple"
                                            href="suds_score_post.php?client_id=<?php echo $_GET['client_id']; ?>" style="margin-top: 5%;">Submit</a> -->
                                        <button type="submit" name="submit" class="btn btn-purple" style="margin-top: 5%; ">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>


</body>

</html>