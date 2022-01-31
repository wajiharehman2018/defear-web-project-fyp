<?php
session_start();
if( isset($_SESSION['cbt_session'])){
    unset($_SESSION['cbt_session']);
}
if(!isset($_SESSION['cbt_session'])){
    header("Location:therapist_home.php");
}
if( isset($_SESSION['vret_session']) ){
    unset($_SESSION['vret_session']);
}
if(!isset($_SESSION['vret_session'])){
    header("Location:therapist_home.php");
}

?>