<?php
session_start();
include 'connect.php';
echo 'in hrtr';
$data = json_decode($_REQUEST["vretnotes"]);
$session_id = $_SESSION['vret_session']['session_id'];
//traversing the whole object and accessing properties:
$query = "";
$execute_query = "";
foreach((array)$data as $noteObject){
    echo "City: " . $noteObject->note_comment . ", Age: " . $noteObject->note_datetime . "\n";
    $query  = "INSERT INTO Note(session_id,comment,date,status) VALUES($session_id,'".$noteObject->note_comment."','".$noteObject->note_datetime."',0);";
    // echo $query."SM\t\n";    
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