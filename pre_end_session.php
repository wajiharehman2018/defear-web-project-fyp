<?php
include 'connect.php';
session_start();
if (isset($_COOKIE['SessionStatus']))
 {
    if(isset($_SESSION['cbt_session']['session_id'])){        
        $session_id = $_SESSION['cbt_session']['session_id'];
        echo $session_id;
        $end_date = date("Y-m-d H:i:s");
        $_SESSION['cbt_session']['end_date'] = $end_date;
        $_SESSION['cbt_session']['active'] = 2;
        $query = "update session set active = 2, end_date = '". $end_date."' where session_id = $session_id";
        echo $query;
        $execute_query = mysqli_query($con,$query);
        if ($execute_query) 
        {
            echo '\nsuccess';
            header("Location:post_suds_score.php");
        }
        else{
            echo $con->error();
            echo $query;
        }
    }	else if(isset($_SESSION['vret_session']['session_id'])){        
        $session_id = $_SESSION['vret_session']['session_id'];
        echo $session_id;
        $end_date = date("Y-m-d H:i:s");
        $_SESSION['vret_session']['end_date'] = $end_date;
        $_SESSION['vret_session']['active'] = 2;
        $query = "update session set active = 2, end_date = '". $end_date."' where session_id = $session_id";
        echo $query;
        $execute_query = mysqli_query($con,$query);
        if ($execute_query) 
        {
            echo '\nsuccess';
            header("Location:post_suds_score.php");
        }
        else{
            echo $con->error();
            echo $query;
        }
    }	
}
?>