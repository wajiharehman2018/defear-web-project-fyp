<?php
session_start();
include 'connect.php';
// echo $_SESSION['cbt_session']['active'];

function dobToAge($dob){
    $birthDate = $dob;
    $birthDate = explode("-", $birthDate);
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
        ? ((date("Y") - $birthDate[0]) - 1)
        : (date("Y") - $birthDate[0]));
    return $age;
}
if(isset($_SESSION['cbt_session'])){
    if($_SESSION['cbt_session']['active']==0){
        $_SESSION['cbt_session']['active'] = 1;
        // $sessionid = $_SESSION['cbt_session']['session_id'];
        $client_id = $_SESSION['cbt_session']['client_id'];
        $therapist_id = $_SESSION['cbt_session']['therapist_id'];
        $session_type = $_SESSION['cbt_session']['session_type'];
        $pre_suds = $_SESSION['cbt_session']['pre_suds'];
        $start_date = $_SESSION['cbt_session']['start_date'];
        $status = $_SESSION['cbt_session']['status'];
        $active = $_SESSION['cbt_session']['active'];
        $title = $_SESSION['cbt_session']['session_title'];
        $sql = "INSERT INTO SESSION(therapist_id,client_id,start_date,session_type,presession_SUDS,status,active,session_title) VALUES($therapist_id,$client_id,'$start_date','$session_type',$pre_suds,$status,$active,'$title');";
        $sql_run = mysqli_query($con, $sql);
        if ($sql_run=== TRUE) {
            $last_id = $con->insert_id;
            $_SESSION['cbt_session']['session_id'] = $last_id;
            // echo "New record created successfully. Last inserted ID is: " . $_SESSION['cbt_session']['session_id'];
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else{
        // echo  $_SESSION['cbt_session']['session_id'];
    }
} else { 
    $sessionid = $_GET['sessionid'];
    $result = mysqli_query($con,"SELECT * from session where session_id = $sessionid LIMIT 1");
    $row = mysqli_fetch_assoc($result);     
        $cbt_session = array(
            'session_id' => $row['session_id'],
            'therapist_id' => $row['therapist_id'],
            'client_id' => $row['client_id'],
            'session_type' => $row['session_type'],
            'session_title' => $row['session_title'], //$_POST['session_type'],
            'pre_suds' => $row['presession_SUDS'],
            'start_date' => $row['start_date'],
            'age' => 0,
            'end_date' => '',
            'post_suds' => '',
            'status' => 0,
            'active' => 1
        );
        $_SESSION['cbt_session'] = $cbt_session;	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    <title>DeFear - CBT Session</title>
</head>

<body class="bg-light">
    <div class="container-fluid">

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
        <?php
        $client_id = $_SESSION['cbt_session']['client_id'];
        if(isset($_SESSION['cbt_session']) && $_SESSION['cbt_session']['active']==1){
            $client_query = "SELECT * from clients where client_id = ".$client_id;
            $result = mysqli_query($con,$client_query);
            if($result){
                $row=mysqli_fetch_assoc($result);
                
    ?>
        <div class="container" style="border:0px solid red;">
            <div class="row my-5" style="border:0px solid blue;">
                <div class="col-4 mx-auto df-cbt-session-details df-session-initial py-3 px-4 bg-white">
                    <div class="df-cbt-session-id">
                        Session # <?php echo $_SESSION['cbt_session']['session_id']; ?>
                    </div>
                    <div class="df-cbt-session-title my-3">
                        <?php echo $_SESSION['cbt_session']['session_title']; ?>
                    </div>

                    <div class="df-cbt-session-sub-details">
                        <div class="row my-3">
                            <div class="col-12 my-3">
                                <span><i class="fa fa-user"></i></span>
                                <p id="clientName" class="ml-1 d-inline">
                                    <?php echo $row['firstname']." ".$row['lastname'];?></p>
                            </div>
                            <div class="col-12 my-3">
                                <span><i class="fa fa-calendar"></i></span>
                                <p id="startDate" class="ml-2 d-inline">
                                    <?php echo $_SESSION['cbt_session']['start_date']; ?></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5">
                                <span><i class="fa fa-venus-mars"></i></span>
                                <p id="clientGender" class="d-inline">
                                    <?php echo $row['gender'];?></p>
                            </div>
                            <div class="col-7">
                                <span><i class="fa fa-clock-o"></i></span>
                                <p id="age" class="ml-2 d-inline">
                                    <?php 
                                if( $row['dateofbirth'] != null ){
                                    $age = dobToAge($row['dateofbirth']);
                                    echo $age.' years';  
                                    $_SESSION['cbt_session']['age'] = $age;
                                }
                                else{
                                    echo '0';
                                }                                                         
                                ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="df-cbt-client-details">
                        <!-- <form>
                        <div class="form-group purple-border">
                            <label for="diagnosis">Diagnosis</label>
                            <input type="text" class="form-control" id="cbt-diagnosis">
                        </div>
                    </form> -->
                    </div>
                    <?php
                     }              
                    }      
                ?>
                </div>
                <div class="col-7 mx-auto df-cbt-session-details py-3 px-4 bg-white">
                    <div class="df-notes-header mb-3">
                        Notes
                    </div>
                    <div class="df-cbt-session-title">
                        <div class="form-group purple-border">
                            <textarea class="form-control" id="notesText" rows="3"></textarea>
                        </div>
                        <div class="btn btn-default btn-primary btn-add-note btn-purple float-right" id="btnAddNote">Add
                            Note</div>
                    </div>
                    <!-- <div id="stopwatch">
                    00:00:00
                </div> -->
                    <button type="button" class="btn btn-secondary btn-grey mt-5" data-toggle="modal"
                        data-target="#confirmationModal">
                        End Session
                    </button>
                    <!-- <button type="button" class="btn btn-secondary" onclick="voice()">
                        Start Speaking
                    </button> -->

                    <script>
                    // function voice() {
                    //     if ("webkitSpeechRecognition" in window) {
                    //         var recognition = new webkitSpeechRecognition();
                    //         recognition.lang = "en-GB";
                    //         recognition.onresult = function(event) {
                    //             console.log(event);
                    //             document.getElementById("notesText").value =
                    //                 event.results[0][0].transcript;
                    //         }
                    //         // Speech Recognition Stuff goes here

                    //     } else {
                    //         console.log("Speech Recognition Not Available")
                    //     }

                    // }
                    </script>
                </div>
            </div>
            <div class="form-group has-search purple-border mx-auto">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control mx-auto" id="searchNote" placeholder="Search">
            </div>
            <div class="row container-fluid">
                <div class="col-12">
                    <table class="table table-borderless">
                        <thead>
                            <tr style="border:0px solid blue;">
                                <th style="border:0px solid black;" scope="col">#</th>
                                <th style="border:0px solid green;" scope="col">Note</th>
                                <th style="border:00px solid yellow;" scope="col">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody id="notes" style="border:0px solid red;">


                            <?php
                            $sessionid = $_SESSION['cbt_session']['session_id'];
                            $notes_query = mysqli_query($con,"select * from note where session_id = $sessionid");     
                            $count = 0;
                            ?>

                            <?php
                                if(mysqli_num_rows($notes_query) > 0){
                                    while($row = mysqli_fetch_assoc($notes_query)) {                                    
                                    $count++;
                            ?>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><?php echo $row["comment"];?></td>
                                <td><?php echo $row["date"];?></td>
                                <script>
                                localStorage.clear();
                                </script>
                            </tr>

                            <?php
                                // echo $note["note_id"]."<br>";
                                // echo $note["comment"]."<br>";
                             }
                            }  
                            ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <p class="mt-3">Are you sure you would like to end this session?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-purple" id="btnEndSession" name="btn_end_session"
                            onclick="endSession()"><a id="endSession">Yes</a></button>
                        <button type="button" class="btn btn-secondary btn-grey" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
    <script>
    document.getElementById("notesText").addEventListener("keyup", function(event) {
        // event.preventDefault();
        if (event.keyCode === 13) {
            document.getElementById("btnAddNote").click();
        }

    });
    </script>

</body>

</html>