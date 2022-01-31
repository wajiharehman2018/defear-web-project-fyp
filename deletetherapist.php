<?php 

include "connect.php"; // Using database connection file here

$todelete = $_GET['id']; // get id through query string

$del = "delete from users where id = '$todelete'"; // delete query

$data= mysqli_query($con,$del);

if($data)
{
     
    echo '<script> alert(Data Deleted)</script>';
    header("Location:teacher_home.php");

}
else
{
    echo "Error deleting record"; // display error message if not delete
}

?>


