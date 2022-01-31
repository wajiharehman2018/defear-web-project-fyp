<?php
session_start();
include 'connect.php';
$data = json_decode($_REQUEST["j"]);
$session_id = $_SESSION['cbt_session']['session_id'];
$query = "";
$execute_query = "";
foreach((array)$data as $noteObject){
    $query  = "INSERT INTO Note(session_id,comment,date,status) VALUES($session_id,'".$noteObject->note_comment."','".$noteObject->note_datetime."',0);";
    $execute_query = mysqli_query($con,$query);
}
echo $execute_query;
if( $execute_query ){
    header("Location:pre_end_session.php");
}
else{
    echo "Notes saving failed";
}
?>