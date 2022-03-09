<?php 
	include '../config.php'; 
	
	$tid = $_GET['tid'];
	
	$msg = "";
	if(isset($tid) && !empty($tid)){
		
		$emp_sql = "DELETE FROM trackinglog WHERE tid=".$tid.";";
		if ($conn->query($emp_sql) === TRUE) {
		  $msg = "Tracking log record deleted successfully";
		} else {
		  $msg = "Error deleting record: " . $conn->error;
		}
	}
	header("Location: ".SITE_URL."tracking_log/list.php?msg=".$msg);
	die();
?>