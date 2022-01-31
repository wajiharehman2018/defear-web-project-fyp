<?php 
include 'connect.php';
session_start();
if( isset($_POST["end_session_submit"]) && isset($_SESSION['cbt_session'])){
    $post_suds = $_POST["post_suds_score"];
    $pre_suds = $_SESSION['cbt_session']['pre_suds'];
    $progress = ($post_suds - $pre_suds)/$pre_suds;
    $_SESSION['cbt_session']['post_suds'] = $post_suds;  
    $_SESSION['cbt_session']['progress'] = $progress;  
    $session_id = $_SESSION['cbt_session']['session_id'];
    $query = "update session set active = 2, postsession_SUDS = $post_suds, progress = $progress where session_id = $session_id";
    $execute_query = mysqli_query($con,$query);
} 
else if( isset($_POST["end_session_submit"]) && isset($_SESSION['vret_session'])){
    $post_suds = $_POST["post_suds_score"];
    $pre_suds = $_SESSION['vret_session']['pre_suds'];
    $progress = ($post_suds - $pre_suds)/$pre_suds;
    $_SESSION['vret_session']['post_suds'] = $post_suds;  
    $_SESSION['vret_session']['progress'] = $progress;  
    $session_id = $_SESSION['vret_session']['session_id'];
    $query = "update session set active = 2, postsession_SUDS = $post_suds, progress = $progress where session_id = $session_id";
    $execute_query = mysqli_query($con,$query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/app.css">
    <title>DeFear - Session Summary</title>
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
    <div class="bg-light">
        <div class="container">
            <div class="row">
                <!-- <div class="col-12 display-4 text-center pt-5">
                    Session recorded successfully.
                </div> -->
                <div class="col-12">
                    <div class="df-cbt-summary-report my-5 bg-white">
                        <div class="df-cbt-sr-banner pt-3 pb-3 px-4">
                            <div class="df-session-summary-heading display-4 " style="font-size:40px!important;">
                                <span><i class="df-cbt-sr-banner-icon fa fa-bar-chart"></i></span>Session #
                                <?php 
                            if(isset($_SESSION['cbt_session'])){
                                echo $_SESSION['cbt_session']['session_id'];
                            }
                            else  if(isset($_SESSION['vret_session'])){
                                echo $_SESSION['vret_session']['session_id'];
                            }
                            else{
                                echo "";
                            }
                            ?>
                                - Summary Report
                            </div>

                        </div>

                        <?php 
                         if(isset($_SESSION['cbt_session'])){                             
                            $clientid = $_SESSION['cbt_session']['client_id'];
                            $query = "select * from clients where client_id = $clientid";
                            $result = mysqli_query($con,$query);
                            $row = array();
                            if($result){
                                $row=mysqli_fetch_assoc($result);
                            }
                        ?>
                        <div class="df-cbt-sr-body p-3">
                            <div class="container">
                                <div class="row df-cbt-sr-session-title">
                                    <div class="col-12">
                                        <?php 
                                            echo $_SESSION['cbt_session']['session_title'].'<br>';
                                            // echo 'Session for Anxiety<br>'; 
                                        ?>
                                        <p class="mt-2" style="font-weight:normal!important;">
                                            Therapist :
                                            <span style="font-weight:lighter!important;">
                                                <?php       
                                                    $therapist_name = $_SESSION['firstname']." ".$_SESSION['lastname'];                                         
                                                    echo $therapist_name; 
                                                ?>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-12 col-sm-12">
                                        <div class="df-cbt-sr-client-details">
                                            <div class="row df-cbt-sr-client-name-container pb-1 mx-1">
                                                <div class="col-1">
                                                    <span class="text-right"><i class="fa fa-user"></i></span>
                                                </div>
                                                <div class="col-3 text-left">
                                                    <?php 
                                                            echo trim($row['firstname'])." ".trim($row['lastname']);
                                                    ?>
                                                </div>
                                                <div class="col-3 text-left">
                                                    <?php 
                                                            echo trim($row['dateofbirth']);
                                                            // if($_SESSION['cbt_session']['age'] != null){
                                                            //     echo trim($_SESSION['cbt_session']['age']);
                                                            // }
                                                        ?>
                                                </div>
                                                <div class="col-3 text-left">
                                                    <?php 
                                                            echo trim($row['gender']);
                                                        ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12 col-md-12 col-sm-12">
                                        <div class="df-cbt-sr-client-details">
                                            <div class="row df-cbt-sr-client-container pb-1 mx-1">
                                                <div class="col-1">
                                                    <span class="text-right"><i class="fa fa-file-text"></i></span>
                                                </div>
                                                <div class="col-3 text-left">
                                                    <label>
                                                        Session Type
                                                    </label>
                                                    <p>
                                                        <?php 
                                                            echo $_SESSION['cbt_session']['session_type'];
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="col-3 text-left">
                                                    <label>
                                                        Start Date
                                                    </label>
                                                    <p>
                                                        <?php 
                                                        echo $_SESSION['cbt_session']['start_date'];
                                                    ?>
                                                    </p>
                                                </div>
                                                <div class="col-3 text-left">
                                                    <label>
                                                        End Date
                                                    </label>
                                                    <p>
                                                        <?php 
                                                            echo $_SESSION['cbt_session']['end_date'];
                                                        ?>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-12 col-md-12 col-sm-12">
                                        <div class="df-cbt-sr-client-details">
                                            <div class="row df-cbt-sr-client-container pb-1 mx-1">
                                                <div class="col-1">
                                                </div>
                                                <div class="col-3 text-left">
                                                    <label>
                                                        Pre-session SUDS
                                                    </label>
                                                    <p>
                                                        <?php 
                                                            echo $_SESSION['cbt_session']['pre_suds'];
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="col-3 text-left">
                                                    <label>
                                                        Post-session SUDS
                                                    </label>
                                                    <p>
                                                        <?php 
                                                        echo $_SESSION['cbt_session']['post_suds'];
                                                    ?>
                                                    </p>
                                                </div>
                                                <div class="col-3 text-left">
                                                    <label>
                                                        Session Status
                                                    </label>
                                                    <p>
                                                        <?php 
                                                            $activestatus = $_SESSION['cbt_session']['active'];
                                                            if( $activestatus == 0 ){
                                                                echo "Not started";
                                                            }
                                                            else if( $activestatus == 1  ){
                                                                echo "In Progress";
                                                            } else if( $activestatus == 2  ){
                                                                echo "Completed";
                                                            }
                                                            else{
                                                                echo "Undefined";
                                                            }
                                                        ?>
                                                    </p>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button onclick="window.print()" class="no-printme btn btn-purple mt-3">
                                    <span><i class="fa fa-print"></i></span>
                                </button>
                                <button onclick="backToList()" class="no-printme btn btn-purple mt-3">
                                    <span><i class="fa fa-list"></i></span> Back to List
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php                                             
                }
                else
                if(isset($_SESSION['vret_session'])){                             
                   $clientid = $_SESSION['vret_session']['client_id'];
                   $query = "select * from clients where client_id = $clientid";
                   $result = mysqli_query($con,$query);
                   $row = array();
                   if($result){
                       $row=mysqli_fetch_assoc($result);
                   }
               ?>
            <div class="df-cbt-sr-body p-3">
                <div class="container">
                    <div class="row df-cbt-sr-session-title">
                        <div class="col-12">
                            <?php 
                                   echo $_SESSION['vret_session']['session_title'].'<br>';
                                   // echo 'Session for Anxiety<br>'; 
                               ?>
                            <p class="mt-2" style="font-weight:normal!important;">
                                Therapist :
                                <span style="font-weight:lighter!important;">
                                    <?php       
                                           $therapist_name = $_SESSION['firstname']." ".$_SESSION['lastname'];                                         
                                           echo $therapist_name; 
                                       ?>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-sm-12">
                            <div class="df-cbt-sr-client-details">
                                <div class="row df-cbt-sr-client-name-container pb-1 mx-1">
                                    <div class="col-1">
                                        <span class="text-right"><i class="fa fa-user"></i></span>
                                    </div>
                                    <div class="col-4 text-left">
                                        <?php 
                                                   echo trim($row['firstname'])." ".trim($row['lastname']);
                                           ?>
                                    </div>
                                    <div class="col-4 text-left">
                                        <?php 
                                                   echo trim($row['dateofbirth']);
                                                   // if($_SESSION['cbt_session']['age'] != null){
                                                   //     echo trim($_SESSION['cbt_session']['age']);
                                                   // }
                                               ?>
                                    </div>
                                    <div class="col-3 text-left">
                                        <?php 
                                                   echo trim($row['gender']);
                                               ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 col-md-12 col-sm-12">
                            <div class="df-cbt-sr-client-details">
                                <div class="row df-cbt-sr-client-container pb-1 mx-1">
                                    <div class="col-1">
                                        <span class="text-right"><i class="fa fa-file-text"></i></span>
                                    </div>
                                    <div class="col-4 text-left">
                                        <label>
                                            Session Type
                                        </label>
                                        <p>
                                            <?php 
                                                   echo $_SESSION['vret_session']['session_type'];
                                               ?>
                                        </p>
                                    </div>
                                    <div class="col-4 text-left">
                                        <label>
                                            Start Date
                                        </label>
                                        <p>
                                            <?php 
                                               echo $_SESSION['vret_session']['start_date'];
                                           ?>
                                        </p>
                                    </div>
                                    <div class="col-3 text-left">
                                        <label>
                                            End Date
                                        </label>
                                        <p>
                                            <?php 
                                                   echo $_SESSION['vret_session']['end_date'];
                                               ?>
                                        </p>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-12 col-md-12 col-sm-12">
                            <div class="df-cbt-sr-client-details">
                                <div class="row df-cbt-sr-client-container pb-1 mx-1">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-4 text-left">
                                        <label>
                                            Pre-session SUDS
                                        </label>
                                        <p>
                                            <?php 
                                                   echo $_SESSION['vret_session']['pre_suds'];
                                               ?>
                                        </p>
                                    </div>
                                    <div class="col-4 text-left">
                                        <label>
                                            Post-session SUDS
                                        </label>
                                        <p>
                                            <?php 
                                               echo $_SESSION['vret_session']['post_suds'];
                                           ?>
                                        </p>
                                    </div>
                                    <div class="col-3 text-left">
                                        <label>
                                            Session Status
                                        </label>
                                        <p>
                                            <?php 
                                                   $activestatus = $_SESSION['vret_session']['active'];
                                                   if( $activestatus == 0 ){
                                                       echo "Not started";
                                                   }
                                                   else if( $activestatus == 1  ){
                                                       echo "In Progress";
                                                   } else if( $activestatus == 2  ){
                                                       echo "Completed";
                                                   }
                                                   else{
                                                       echo "Undefined";
                                                   }
                                               
                                               ?>
                                        </p>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <?php
                            $scenario_num = $_SESSION['vret_session']['scenario_num'];
                            $scenario_row = null;
                            $scenario_query = "SELECT * from scenario where s_no = ".$scenario_num;
                            $scenario_result = mysqli_query($con,$scenario_query);
                            if($scenario_result){
                                $scenario_row=mysqli_fetch_assoc($scenario_result);
                            }
                        ?>
                    <div class="row mt-1">
                        <div class="col-12 col-md-12 col-sm-12">
                            <div class="df-cbt-sr-client-details">
                                <div class="row df-cbt-sr-client-container pb-1 mx-1">
                                    <div class="col-1">
                                    </div>
                                    <div class="col-4 text-left">
                                        <label>
                                            Phobia
                                        </label>
                                        <p>
                                            <?php 
                                                   echo $scenario_row['phobia'];
                                               ?>
                                        </p>
                                    </div>
                                    <div class="col-4 text-left">
                                        <label>
                                            Level
                                        </label>
                                        <p>
                                            <?php 
                                               echo $scenario_row['level'];
                                           ?>
                                        </p>
                                    </div>
                                    <div class="col-3 text-left">
                                        <label>
                                            Milestone
                                        </label>
                                        <p>
                                            <?php 
                                                   echo $scenario_row['milestone'];
                                               ?>
                                        </p>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <button onclick="window.print()" class="no-printme btn btn-purple mt-3">
                        <span><i class="fa fa-print"></i></span>
                    </button>
                    <button onclick="backToList()" class="no-printme btn btn-purple mt-3">
                        <span><i class="fa fa-list"></i></span> Back to List
                    </button>
                </div>
            </div>
            <?php
                    }
                    else{
                        echo 0;
                    }
            ?>
            <div class="row df-cbt-sr-session-title text-center">
                <div class="col-12">
                    Session Notes
                </div>
            </div>
            <div class="row container-fluid px-5">

                <div class="col-12">
                    <table class="table">
                        <?php
                            $sessionid = 0;
                            if( isset($_SESSION['cbt_session'] )){                                
                                $sessionid = $_SESSION['cbt_session']['session_id'];
                            }
                            else if( isset($_SESSION['vret_session'] )){                                
                                $sessionid = $_SESSION['vret_session']['session_id'];
                            }
                            $notes_query = mysqli_query($con,"select * from note where session_id = $sessionid");     
                            $count = 0;
                        ?>
                        <thead>
                            <tr style="border:0px solid blue;">
                                <th style="border:0px solid black;" scope="col">#</th>
                                <th style="border:0px solid green;" scope="col">Note</th>
                                <th style="border:00px solid yellow;" scope="col">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(mysqli_num_rows($notes_query) > 0){
                                    while($row = mysqli_fetch_assoc($notes_query)) {                                    
                                    $count++;
                            ?>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $row["comment"];?></td>
                                <td><?php echo $row["date"];?></td>
                            </tr>

                            <?php
                                // echo $note["note_id"]."<br>";
                                // echo $note["comment"]."<br>";
                             }
                            } 
                            
                            else{
                                echo "No notes recorded for this session.";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>