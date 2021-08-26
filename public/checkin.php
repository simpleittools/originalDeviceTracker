<?php
	include("includes/config/config.php");
	include("includes/functions/error_functions.php");
	include("includes/functions/login_functions.php");
	include("includes/functions/validation_functions.php");
	include("includes/functions/functions.php");
	confirm_logged_in();
	
?>
<?php
	//This page is activated with the Check In button.
	$id=$_GET['id'];
	check_in($id);

	header('Location: device_search.php');
?>