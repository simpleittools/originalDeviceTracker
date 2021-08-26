<?php
	include("../../includes/config/db.php");
//	include("includes/functions/error_functions.php");
//	include("includes/functions/login_functions.php");
//	include("includes/functions/validation_functions.php");
	include("../../includes/functions/sql_functions.php");
	
	
?>
<?php
	//This page is activated with the Check In button.
	$id=$_GET['id'];
	check_in($id);

	header('Location: ../../backupDeviceSearch.php');
?>