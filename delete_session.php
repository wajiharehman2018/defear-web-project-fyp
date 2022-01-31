<?php
  include 'connect.php';
  session_start(); 
  $id = $_GET['id'];
  $userid = $_GET['userid'];
  echo $id;
  $sql = "DELETE FROM `session` WHERE session_id=$id";

  if ($con->query($sql) === TRUE) { 
    header('Location:client_profile.php?id='.$userid.'&success=Deleted successfully');
  } else {
    header('Location:client_profile.php?id='.$userid.'&error=Error deleting record');
  }

  $con->close();
?>