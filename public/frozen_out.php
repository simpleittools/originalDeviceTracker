<?php
	include("includes/config/config.php");
	include("includes/functions/error_functions.php");
	include("includes/functions/login_functions.php");
	include("includes/functions/validation_functions.php");
	include("includes/functions/functions.php");
	confirm_logged_in();
	$date_change = date("Y.m.d h:i A");
	$user_id = $_SESSION['user_id'];
?>
<?php confirm_logged_in(); ?>
<?php
	$permission = check_permission($user_id);
	if($permission < 2){
		redirect_to("deny.php");
	};
?>
<?php
	$con;
	$id=$_GET['id'];
	//echo $id;
	frozen_out($id);
	header('Location: device_search.php');
?>