<?php
	include("includes/config/config.php");
	include("includes/functions/error_functions.php");
	include("includes/functions/login_functions.php");
	include("includes/functions/validation_functions.php");
	include("includes/functions/functions.php");
	$date_change = date("Y.m.d h:i A");
	$user_id = $_SESSION['user_id'];
?>
<?php confirm_logged_in(); ?>
<?php
	$user_id = $_SESSION['user_id'];
	$permission = check_permission($user_id);
	if($permission < 2){
		redirect_to("deny.php");
	};
		
?>
<?php
	$id=$_GET['id'];
	frozen_in($id);
	//echo $id;
	header('Location: device_search.php');
?>