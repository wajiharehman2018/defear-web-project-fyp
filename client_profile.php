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

    <div class="container">

        <div class="main-body">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row px-5">
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

                        <form class="form" id="profileImageForm" action="" enctype="multipart/form-data" method="post">
                            <img src="profile_images/<?php echo $row['profile_image'];?>" alt="Admin"
                                class="rounded-circle client-profile-image" width="150">
                            <div class="round-upload-btn">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input type="hidden" name="client_name"
                                    value="<?php echo $row['firstname']." ".$row['lastname'];?>">

                                <input type="file" name="profile_image" id="clientProfileImage"
                                    class="client-profile-uploader" accept=".jpg, .jpeg, .png">
                                <i class="fa fa-camera" style="color:#000;"></i>
                            </div>
                        </form>

                        <div class="flex-column">
                        <div class="mt-3">
                            <h2><b><?php echo $row['firstname']." ".$row['lastname'];  ?></b></h2><br>
                        </div>
                        </div>
                      
                        <div class="mt-3">
                            <h5 style="text-align: left;"><i style='font-size:15px; color:black; '
                                    class='fas fa-phone-alt'></i> <?php echo $row['contact']; ?></h5>
                            <hr>
                        </div>
                        <div class="mt-3">
                            <h5 style="text-align: left;"> <i style='font-size:20px;'
                                    class='fas fa-genderless'></i>&nbsp&nbsp<?php echo $row['gender']; ?></h5>
                            <hr>

                        </div>
                        <div class="mt-3">
                            <h5 style="text-align: left;"><i style='font-size:20px;'
                                    class='fas fa-birthday-cake'></i>&nbsp&nbsp&nbsp&nbsp
                                <?php echo $row['dateofbirth']; ?></h5>
                            <hr>
                        </div>
                        <div class="mt-3">
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
            <div class="row">
                <div class="col-md-12 mb-3">


                </div>

                <div class="col-md-8 ">
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <a class="btn-lg btn-secondary"
                                href="suds_score.php?client_id=<?php echo $row['client_id']; ?>">Start Session</a>

                            <a class="btn-lg btn-danger" href="#" data-toggle="tooltip" title="Delete the client"><i
                                    class="fa fa-close"></i></a>
                            <a class="btn-lg btn-primary" href="therapist_home.php" data-toggle="tooltip"
                                title="Back to clients list"><i class="fa fa-user" aria-hidden="true"></i></a>

                        </div>
                    </div>


                </div>
                <div class="container-fluid mt-5">
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
                        <div class="col-12">

                            <table class="table table-borderless bg-white">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Id</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Progress</th>
                                        <th scope="col">Session Type</th>
                                        <th scope="col">Presession SUDS</th>
                                        <th scope="col">Postsession SUDS</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="clientSessions">
                                    <?php
                                          $count = 0;
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
                                        <td><?php echo $count;?></td>
                                        <td><?php //echo $count;
                                            echo $row['session_id'];  ?></td>

                                        <td><?php echo $row['start_date'];  ?></td>
                                        <td><?php echo $row['end_date'];  ?></td>
                                        <td>
                                            <?php 
                                            $progress = $row['progress']*100;
                                            echo number_format((float)$progress, 2, '.', '').'%';  ?>
                                        </td>
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
                                                    class="text-dark">Details</a></button>
                                        </td>

                                        <?php
                                                }
                                            ?>
                                        <td>
                                            <button class="btn btn-danger btn-delete" data-toggle="modal"
                                                data-target="#confirmationModal"
                                                data-sessionid="<?php echo $row['session_id'];?>">
                                                <i class="fa fa-times" style="color:#fff;"></i></button>
                                        </td>
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
            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <p class="mt-3">Would you like to delete this session record?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-purple delete-session-btn" id="btnDeleteSession"
                                name="btn_delete_session" onclick=""><a id="deleteSession">Yes</a></button>
                            <button type="button" class="btn btn-secondary btn-grey" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" id="toDelete" value="0">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script>
    document.getElementById("clientProfileImage").onchange = function() {
        document.getElementById("profileImageForm").submit();
    }
    $(document).ready(function() {
        $('.btn-delete').click(function() {
            var id = $(this).data('sessionid');
            $('#toDelete').val(id);
            console.log(id);
        });
        $('.delete-session-btn').click(function() {
            var id_delete = $('#toDelete').val();
            var userid = "<?php echo $_GET['id']; ?>";
            $('#deleteSession').attr('href', 'delete_session.php?id=' + id_delete + '&userid=' +
                userid);
        });
    });
    </script>
    <?php
    include 'connect.php';
    session_start(); 
    echo $_FILES["profile_image"]["name"];
    if(isset($_FILES["profile_image"]["name"])){
        echo 'Hello';
      $id = $_POST["id"];
      $name = $_POST["client_name"];

      $imageName = $_FILES["profile_image"]["name"];
      $imageSize = $_FILES["profile_image"]["size"];
      $tmpName = $_FILES["profile_image"]["tmp_name"];

      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = '../updateimageprofile';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
        //   document.location.href = '../updateimageprofile';
        </script>
        ";
      }
      else{
        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;
        $query = "UPDATE clients SET profile_image = '$newImageName' WHERE client_id = $id";
        mysqli_query($con, $query);
        move_uploaded_file($tmpName, 'profile_images/' . $newImageName);
        echo
        "
        <script>
        // document.location.href = '../updateimageprofile';
        </script>
        ";
      }
    }
    ?>

</body>

</html>