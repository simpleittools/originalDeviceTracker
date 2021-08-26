<?php include("includes/config/config.php") ?>
<?php include("includes/functions/error_functions.php") ?>
<?php include("includes/functions/login_functions.php") ?>
<?php include("includes/functions/validation_functions.php") ?>
<?php include("includes/functions/functions.php") ?>
<?php include("includes/functions/sql_functions.php") ?>
<?php confirm_logged_in(); ?>
<h1>you are logged in</h1>

<?php
	$user_id = $_SESSION['user_id'];
?>
<?php
	echo $user_id;
?>
<!-- Extracts permission level -->
<?php
	global $con;
		$query  = "SELECT Permission ";
		$query .= "FROM users ";
		$query .= "WHERE id = {$user_id} ";
		$query .= "LIMIT 1";
		$permission_set = mysqli_query($con, $query);
		while($rows = mysqli_fetch_array($permission_set)){
			$permission=$rows['Permission'];
		
		
?>
<h1>Your permission level is:</h1>

<?php
	echo $permission;
		};
?>