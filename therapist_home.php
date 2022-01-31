<?php
session_start();
include 'connect.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=2){
		header("Location:teacher_home.php");
	}
		$logged = $_SESSION['user_data']['id'];
		$info=array();
	$qr=mysqli_query($con,"select * from clients where usertype='3' and therapist_fk = ".$logged);
	while($row=mysqli_fetch_assoc($qr)){
		array_push($info,$row);
	}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Therapist Home</title>
    <?php include 'css.php'; ?>
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    <title>DeFear - Therapist Panel</title>
</head>

<style type="text/css">
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
                    <a class="nav-link active" href="therapist_home.php" style="font-size: 17px">Clients</a>
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

        <img src="images/headerbgtherapist.jpg" style="max-width: 99.8%">
        <div class="row">
            <div class="col-12">
                <a href="add_client.php" class="btn btn-purple pull-right my-3"
                    style="margin-left:785px; font-size: 15px">Add Client</a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group client-search purple-border mx-auto my-4"
                    style="font-size:1.35rem; height:3rem;">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control mx-auto" id="searchClient" placeholder="Search by name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <table class="table table-stripe" id="myTable">
                        <thead>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>View</th>
                        </thead>
                        <?php
				  foreach($info as $in) {
				 ?>
                        <tr class="client-item">
                            <td><?php echo $in['client_id']; ?></td>
                            <td class="first-name"><?php echo $in['firstname']; ?></td>
                            <td class="last-name"><?php echo $in['lastname']; ?></td>
                            <td><?php echo $in['contact']; ?></td>
                            <td><?php echo $in['dateofbirth']; ?></td>
                            <td><?php echo $in['gender']; ?></td>
                            <td><?php echo $in['address']; ?></td>
                            <!--Edit button below-->
                            <td><a class="btn btn-info"
                                    href="edit_client.php?client_id=<?php echo $in['client_id']; ?> && fn=<?php echo $in['firstname']; ?> && ln=<?php echo $in['lastname']; ?> && cont=<?php echo $in['contact']; ?> && dob=<?php echo $in['dateofbirth']; ?> && gender=<?php echo $in['gender']; ?> && address=<?php echo $in['address']; ?>"><i
                                        class="fa fa-pencil"></i></a></td>

                            <td><a class="btn btn-danger"
                                    href="deleteclient.php?id=<?php echo $in['client_id']; ?>">Delete </a>
                            </td>

                            <!--detail button below-->
                            <td><a class="btn btn-primary"
                                    href="client_profile.php?id=<?php echo $in['client_id']; ?>"><i
                                        class="fa fa-user"></i></a></td>
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
<script src="js/search_client.js"></script>
</html>
<?php
}
else{
	header("Location:index.php?error=UnAuthorized Access");
}