<?php
	include("includes/config/config.php");
	include("includes/functions/error_functions.php");
	include("includes/functions/login_functions.php");
	include("includes/functions/validation_functions.php");
	include("includes/functions/functions.php");
	confirm_logged_in();
	
?>

<?php
	$id=$_GET['id'];
	check_out($id);
	header('Location: device_search.php');
?>

<!--<body>
	Are you sure you want to check out this device?
	<input type="button" name="CheckOut" method="POST" value="Check Out" onclick="location.href='device_results.php';">
</body>-->