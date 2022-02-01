<?php
include '../connect.php';
$select = mysqli_query($con, "SELECT * FROM users WHERE email = '".$_POST['email']."'");
if(mysqli_num_rows($select)) {
    echo "1";
}else{
    echo "0";
}
?>