<?php 
	include '../config.php'; 
	
	$uid = $_GET['uid'];
	
	$msg = "";
	if(isset($uid) && !empty($uid)){
		
		$emp_sql = "DELETE FROM sensor_repair_log WHERE uid=".$uid.";";
		if ($conn->query($emp_sql) === TRUE) {
		  $msg = "Sensor repair log record deleted successfully";
		} else {
		  $msg = "Error deleting record: " . $conn->error;
		}
	}
	header("Location: ".SITE_URL."sensor_repair_log/list.php?msg=".$msg);
	die();
?>