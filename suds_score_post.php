<?php
session_start();
include 'connect.php';
$errors = array();
unset($_SESSION['errors']);
if (isset($_POST['submit'])) {
	$clientid = $_POST['client_id'];
	echo $clientid;
	if(empty($_POST['suds_score'])){
		$errors["pre_suds_err"] = "Please select a SUDS score.";
	}
	if(empty($_POST['session_type'])){
		$errors["session_type_err"] = "Please select a session type.";
	}
	if(empty($_POST['session_title'])){
		$errors["session_title_err"] = "Please enter session title.";
	}
	if( count($errors) > 0){
		$_SESSION['errors'] = $errors;
		header("Location:suds_score.php?client_id=$clientid");
	}
	else{
		$_SESSION["session_type"] = $_POST['session_type'];
		unset($_SESSION['errors']);
		unset($_SESSION["session_type"]);
		if( isset($_SESSION['cbt_session'])){
			unset($_SESSION['cbt_session']);
		}
		if( $_POST['session_type']=="CBT"){
			if(!isset($_SESSION['cbt_session'])){
				$cbt_session = array(
					'session_id' => 0,
					'therapist_id' => $_SESSION['user_data']['id'],
					'client_id' => $_POST['client_id'],
					'session_type' => $_POST['session_type'],
					'session_title' => $_POST['session_title'], //$_POST['session_type'],
					'pre_suds' => $_POST['suds_score'],
					'start_date' => date("Y-m-d H:i:s"),
					'age' => 0,
					'end_date' => '',
					'post_suds' => '',
					'status' => 0,
					'active' => 0
				);
				$_SESSION['cbt_session'] = $cbt_session;				
				header("Location:cbt_session.php");
			}	
			else{
				echo 'Something went wrong. Please refresh page.';
				echo $_SESSION['cbt_session']['session_id'];
			}		
		} else if ($_POST['session_type']=="VRET") {
			$vret_session = array(
				'session_id' => 0,
				'therapist_id' => $_SESSION['user_data']['id'],
				'client_id' => $_POST['client_id'],
				'session_type' => $_POST['session_type'],
				'session_title' => $_POST['session_title'], //$_POST['session_type'],
				'pre_suds' => $_POST['suds_score'],
				'start_date' => date("Y-m-d H:i:s"),
				'age' => 0,
				'end_date' => '',
				'post_suds' => '',
				'status' => 0,
				'active' => 0,
				'scenario_num' => 0
			);
			$_SESSION['vret_session'] = $vret_session;				
			header("Location:vret_phobia_selection.php");
		}
		// $score = $_POST['suds_score'];
		// $clientid = $_POST['client_id'];	

		// $query = "update clients set suds_score='$score' where client_id = $clientid";
		// $query_run = mysqli_query($con, $query);
		
		// if ($query_run) {			

		// }	
		// else {	
		// 	echo "Data not Saved";
		// }	
	}	
}