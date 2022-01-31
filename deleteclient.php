<?php 

include "connect.php"; // Using database connection file here

$todelete = $_GET['id']; // get id through query string

$del = "delete from clients where client_id = '$todelete'"; // delete query

$data= mysqli_query($con,$del);

if($data)
{   
    header("Location:therapist_home.php");
    
}
else
{
    echo "Error deleting record"; // display error message if not delete
}

?>


