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

    <style>
    .wrapper1 {
        width: 500px;
        background-color: #8C11BF;
        margin-top: 20%;
        margin-left: 20%;

    }

    .wrapper2 {
        width: 500px;
        background-color: #FFFFFF;
        margin-left: 20%;

    }

    .card-footer h5 {
        color: black;
    }


    /*Profile data card css*/
    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: green;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }

    /*Text area css*/

    textarea {
        position: relative;
        min-width: 300px;
        height: 200px;
        background: #fff;
        color: #000;
        font-size: 20px;
        font-family: arial;
        outline: none;
        letter-spacing: 1px;
    }
    </style>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
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

    <nav class="navbar navbar-expand-md bg-white navbar-light">
        <a class="navbar-brand" href="#"><img src="images/logo_defear.png" width="125" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="therapist_home.php" style="font-size: 17px">Home</a>
                </li>
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
        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $count = 0;
                $query = "SELECT * FROM clients WHERE client_id='$id' ";
                $query_run = mysqli_query($con, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                    {
                        ?>
        <div class="row">
            <div class="col-md-12 col-12 col-sm-12">
                <div class="card df-client-profile-container grey-shadow">
                    <div class="card-body">
                        <div class="d-flex flex-row align-items-left">
                            <div class="df-client-profile-image">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle grey-shadow p-2" width="150">
                            </div>
                            <div class="df-client-profile-details mx-4" style="border:2px solid red;">
                                <div class="df-client-profile-name">
                                    <?php
                                    echo $row['firstname'].' '.$row['lastname'];
                                ?>
                                </div>
                                <div class="df-client-profile-contact">
                                    <span class="mr-2">
                                        <i style='font-size:12px; color:gray;' class='fas fa-phone-alt'></i>
                                    </span>
                                    <?php
                                        echo $row['contact']; 
                                    ?>
                                </div>
                                <div class="d-flex flex-column">
                                    <a class="d-flex btn btn-secondary align-content-end"
                                        href="suds_score.php?client_id=<?php echo $row['client_id']; ?>">Start
                                        Session</a>
                                    <button onClick="openWindow()">
                                        <a class="d-flex btn btn-secondary align-content-end" href="build2\Testing Scenes.exe">Go</a>
                                    </button>

                                    <script type="text/javascript">
                                    function openWindow() {
                                        window.location.href = "build2\Testing Scenes.exe";
                                        window.open('build2\Testing Scenes.exe'); // opens in a new window
                                        alert("Hello");
                                    }
                                    </script>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
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
        <div class="main-body">

            <!-- Breadcrumb -->
            <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav> -->
            <!-- /Breadcrumb -->




            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <?php 
                                    if(isset($_GET['id']))
                                    {
                                        $id = $_GET['id'];
                                        $count = 0;
                                        $query = "SELECT * FROM clients WHERE client_id='$id' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                    <h2><b><?php echo $row['firstname']." ".$row['lastname'];  ?></b></h2><br>
                                    <h5 style="text-align: left;"><i style='font-size:15px; color:black; '
                                            class='fas fa-phone-alt'></i> <?php echo $row['contact']; ?></h5>
                                    <hr>
                                    <h5 style="text-align: left;"> <i style='font-size:20px;'
                                            class='fas fa-genderless'></i>&nbsp&nbsp<?php echo $row['gender']; ?></h5>
                                    <hr>
                                    <h5 style="text-align: left;"><i style='font-size:20px;'
                                            class='fas fa-birthday-cake'></i>&nbsp&nbsp&nbsp&nbsp
                                        <?php echo $row['dateofbirth']; ?></h5>
                                    <hr>
                                    <h5 style="text-align: left;"><i style='font-size:20px; align-items: left'
                                            class='fas fa-location-arrow'></i>&nbsp&nbsp <?php echo $row['address']; ?>
                                    </h5>
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

                <div class="col-md-8">
                    <textarea rows="5" class="form-control"></textarea>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn-lg btn-secondary"
                                href="suds_score.php?client_id=<?php echo $row['client_id']; ?>">Start Session</a>
                            <a class="btn-lg btn-secondary" href="#">View History</a>
                            <a class="btn-lg btn-info" href="#" data-toggle="tooltip" title="Edit the client"><i
                                    class="fa fa-pencil"></i></a>
                            <a class="btn-lg btn-danger" href="#" data-toggle="tooltip" title="Delete the client"><i
                                    class="fa fa-close"></i></a>
                            <a class="btn-lg btn-primary" href="therapist_home.php" data-toggle="tooltip"
                                title="Back to clients list"><i class="fa fa-user" aria-hidden="true"></i></a>

                        </div>
                    </div>
                    <div class="container-fluid mt-5">

                        <div class="row">
                            <div class="col-12">
                                <table class="table table-borderless bg-white">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Progress</th>
                                            <th scope="col">Session Type</th>
                                            <th scope="col">Presession SUDS</th>
                                            <th scope="col">Postsession SUDS</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="clientSessions">
                                        <?php
                                          if(isset($_GET['id']))
                                          {
                                              $id = $_GET['id'];

                                              $query = "SELECT * FROM session WHERE client_id='$id' ";
                                              $query_run = mysqli_query($con, $query);

                                              if(mysqli_num_rows($query_run) > 0)
                                              {
                                                  foreach($query_run as $row)
                                                  {
                                                      
                                                    $count++;
                                        ?>
                                        <tr>
                                            <td><?php //echo $count;
                                            echo $row['session_id'];  ?></td>

                                            <td><?php echo $row['start_date'];  ?></td>
                                            <td><?php echo $row['end_date'];  ?></td>
                                            <td><?php echo $row['progress'];  ?></td>
                                            <td><?php echo $row['session_type'];  ?></td>
                                            <td><?php echo $row['presession_SUDS'];  ?></td>
                                            <td><?php echo $row['postsession_SUDS'];  ?></td>
                                            <td><?php
                                              if( $row['active']==1){
                                                echo "In Progress";
                                              }
                                              else if( $row['active']==2){
                                                echo "Completed";
                                              }
                                            ?></td>

                                            <?php 
                                                if($row["active"]==1){
                                                    ?>
                                            <td>
                                                <button class="btn btn-success"><a
                                                        href="cbt_session.php?sessionid=<?php echo $row['session_id'];?>"
                                                        class="text-white">Resume</a></button>
                                            </td>

                                            <?php
                                                }
                                                else{
                                                    ?>
                                            <td>
                                                <button class="btn btn-default"><a
                                                        href="cbt_report_summary.php?sessionid=<?php echo $row['session_id'];?>"
                                                        class="text-white">Details</a></button>
                                            </td>
                                            <?php
                                                }
                                            ?>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>

</body>

</html>