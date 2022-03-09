<?php 
	include '../config.php'; 
	
	$empid = $_GET['eid'];
	
	$msg = "";
	if(isset($empid) && !empty($empid)){
		$ename = "";
		$dept_id = "";
		$supervisor = "";
		$addressid = "";
		$phone = "";
		
		$emp_sql = "DELETE FROM employee WHERE empid=".$empid.";";
		if ($conn->query($emp_sql) === TRUE) {
		  $msg = "Employee record deleted successfully";
		} else {
		  $msg = "Error deleting record: " . $conn->error;
		}
	}
	header("Location: ".SITE_URL."employee/list.php?msg=".$msg);
	die();
?>