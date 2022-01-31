<?php
session_start();
include 'connect.php';
// echo isset($_SESSION['vret_session']);
$obj = json_decode($_POST["myData"]);
$s_num = 0;
echo $obj->phobia.' '.$obj->level.' '.$obj->milestone;
if(isset($_SESSION['vret_session'])){
    if($_SESSION['vret_session']['active']==0){
        $_SESSION['vret_session']['active'] = 1; 
        $client_id = $_SESSION['vret_session']['client_id'];
        $therapist_id = $_SESSION['vret_session']['therapist_id'];
        $session_type = $_SESSION['vret_session']['session_type'];
        $pre_suds = $_SESSION['vret_session']['pre_suds'];
        $start_date = $_SESSION['vret_session']['start_date'];
        $status = $_SESSION['vret_session']['status'];
        $active = $_SESSION['vret_session']['active'];
        $phobia = $obj->phobia;
        $level = $obj->level;
        $milestone = $obj->milestone;
        if( $obj != null )
        {            
            $result = mysqli_query($con,"SELECT * from scenario where phobia = '$phobia' AND level='$level' AND milestone = '$milestone' LIMIT 1");
            if($result){
                $row=mysqli_fetch_assoc($result);
                $_SESSION['vret_session']['scenario_num'] = $row['s_no'];
                $s_num = $row['s_no'];
            }                  
        }        
        $sql = "INSERT INTO SESSION(therapist_id,client_id,start_date,session_type,presession_SUDS,status,active,scenario_no) VALUES($therapist_id,$client_id,'$start_date','$session_type',$pre_suds,$status,$active,$s_num);";
        $sql_run = mysqli_query($con, $sql);
        if ($sql_run=== TRUE) { 
            $last_id = $con->insert_id;
            $_SESSION['vret_session']['session_id'] = $last_id;
            echo $_SESSION['vret_session']['session_id'];
            // echo "New record created successfully. Last inserted ID is: " . $_SESSION['cbt_session']['session_id'];
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else{
        echo "Try Again";

    }
} else { 
    //if getting the session from the list and reloading on page
    $sessionid = $_GET['sessionid'];
    $result = mysqli_query($con,"SELECT * from session where session_id = $sessionid LIMIT 1");
    $row = mysqli_fetch_assoc($result);     
        $vret_session = array(
            'session_id' => $row['session_id'],
            'therapist_id' => $row['therapist_id'],
            'client_id' => $row['client_id'],
            'session_type' => $row['session_type'],
            'session_title' => $row['session_title'], //$_POST['session_type'],
            'pre_suds' => $row['presession_SUDS'],
            'start_date' => $row['start_date'],
            'age' => 0,
            'end_date' => '',
            'post_suds' => '',
            'status' => 0,
            'active' => 1
        );
        $_SESSION['vret_session'] = $vret_session;	
}
?>