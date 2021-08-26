<?php
	include("includes/config/config.php");
	include("includes/functions/login_functions.php");
	$date_change = date("Y.m.d h:i A");
	$user_id = $_SESSION['user_id'];
?>
<?php confirm_logged_in(); ?>
<?php
	$user_id = $_SESSION['user_id'];
		global $con;
		$query  = "SELECT Permission ";
		$query .= "FROM users ";
		$query .= "WHERE id = {$user_id} ";
		$query .= "LIMIT 1";
		$permission_set = mysqli_query($con, $query);
		while($rows = mysqli_fetch_array($permission_set)){
			$permission=$rows['Permission'];
		if($permission < 3){
			redirect_to("deny.php");
		};
		};
?>

<?php
	$con;
	$id=$_GET['id'];
	$device_status=$_GET['status'];
	echo $device_status;
	//$change ="UPDATE devices SET status = '$date_change', change_by_id='$user_id', status='4' WHERE id='$id'";
	//$execute = mysqli_query($con, $check_frozen);
	//header('Location: device_search.php');
?>

<div></div>
