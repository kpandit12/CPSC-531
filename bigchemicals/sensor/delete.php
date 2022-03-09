<?php 
	include '../config.php'; 
	
	$sid = $_GET['sid'];
	
	$msg = "";
	if(isset($sid) && !empty($sid)){
		
		$emp_sql = "DELETE FROM sensorslist WHERE sid=".$sid.";";
		if ($conn->query($emp_sql) === TRUE) {
		  $msg = "Sensor record deleted successfully";
		} else {
		  $msg = "Error deleting record: " . $conn->error;
		}
	}
	header("Location: ".SITE_URL."sensor/list.php?msg=".$msg);
	die();
?>