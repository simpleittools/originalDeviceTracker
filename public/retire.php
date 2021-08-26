<?php
	include("includes/config/config.php");
	include("includes/functions/login_functions.php");
	$date_change = date("Y.m.d h:i A");
	$user_id = $_SESSION['user_id'];
?>
<?php confirm_logged_in(); ?>
<?php $permission = check_permission($user_id);?>
<?php
	if($permission < 3){
		redirect_to("deny.php");
	};
?>
<?php
	$con;
	$id=$_GET['id'];
	//echo $id;
	$check_frozen="UPDATE devices SET date_change = '$date_change', change_by_id='$user_id', status='R' WHERE id='$id'";
	$execute = mysqli_query($con, $check_frozen);
	header('Location: mgr_override.php');
?>