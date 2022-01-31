<?php
session_start();
include 'connect.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=1){
		header("Location:student_home.php");
	}

	$data=array();
	$qr=mysqli_query($con,"select * from users where usertype='2'");
	while($row=mysqli_fetch_assoc($qr)){
		array_push($data,$row);
	}

?>
<!DOCTYPE html>
<html>

<head>
    <?php include 'css.php'; ?>
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    <title>DeFear - Admin Panel</title>
    <style>
    th {

        background-color: #B16AD1;
        color: white;
        text-align: center;

    }

    /*styling on table*/
    #myTable {
        border-collapse: collapse;
        /* Collapse borders */
        width: 100%;
        /* Full-width */
        border: 2px;
        /* Add a grey border */
        font-size: 15px;
        /* Increase font-size */

    }

    #myTable th,
    #myTable td {
        text-align: center;
        padding: 10px;
        /* Add padding */
    }

    tr:hover {
        background-color: #F3F2F2;
        /* Add color to the Hover the table*/
    }

    .btn {
        color: white;
        padding: 6px 16px;
    }

    /* Darker background on mouse-over */
    .btn:hover {}
    </style>
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
                <li class="nav-item">
                    <a class="nav-link active" href="teacher_home.php" style="font-size: 17px">Therapists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_requests.php" style="font-size: 17px">Requests</a>
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
            <div class="d-block mt-3 mr-1">
                <a href="logout.php" class="btn btn-purple btn-block" style="font-size: 15px;">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php if(isset($_REQUEST['error'])) { ?>
            <div class="col-lg-12">
                <span class="alert alert-danger" style="display: block;">
                    <?php echo $_REQUEST['error']; ?>
                </span>
            </div>
            <?php } ?>
        </div>
        <div class="row">
            <?php if(isset($_REQUEST['success'])) { ?>
            <div class="col-lg-12">
                <span class="alert alert-success" style="display: block;">
                    <?php echo $_REQUEST['success']; ?>
                </span>
            </div>
            <?php } ?>
        </div>
        <img src="images/headerbg.jpg" style="max-width: 99.8%">
        <div class="row">
            <div class="col-12">
                <a href="add_student.php" class="btn btn-purple pull-right mt-4"
                    style="margin-left:785px; font-size: 15px">Add
                    Therapist</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <table class="table table-stripe" id="myTable">
                        <tr>
                            <th>ID</th>
                            <th style="margin-left: -10%">First Name</th>
                            <th>Last Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Education</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>View</th>

                            <br>
                        </tr>
                        <?php
				  foreach($data as $d) {
				 ?>
                        <tr style="">
                            <td><?php echo $d['id']; ?></td>
                            <td><?php echo $d['firstname']; ?></td>
                            <td><?php echo $d['lastname']; ?></td>
                            <td><?php echo $d['contact']; ?></td>
                            <td><?php echo $d['email']; ?></td>
                            <td><?php echo $d['country']; ?></td>
                            <td><?php echo $d['education']; ?></td>
                            <!--edit button below-->
                            <td><a class="btn btn-light" style="background-color:  #9c54a8  !important"
                                    href="edit_therapist.php?id=<?php echo $d['id']; ?>&& fn=<?php echo $d['firstname']; ?> && ln=<?php echo $d['lastname']; ?> && cont=<?php echo $d['contact']; ?> &&email=<?php echo $d['email']; ?> &&country=<?php echo $d['country']; ?> && education=<?php echo $d['education']; ?>"><i
                                        class="fa fa-pencil"></i></a></td>
                            <!--delete button below-->
                            <td><a class="btn btn-dark" style="background-color:  #9c54a8 !important"
                                    href="deletetherapist.php?id=<?php echo $d['id']; ?>"><i
                                        class="fa fa-close"></i></a></td>
                            <!--detail button below-->
                            <td><a class="btn btn-dark" style="background-color: #9c54a8  !important"
                                    href="profile.php?id=<?php echo $d['id']; ?>"><i class="fa fa-user"></i></a></td>
                        </tr>
                        <?php
				  } 
				?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
}
else{
	header("Location:index.php?error=UnAuthorized Access");
}