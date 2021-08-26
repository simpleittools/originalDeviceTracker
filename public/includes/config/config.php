<?php

	session_start();
	function message() {
		if (isset($_SESSION["message"])) {
			$output = "<div class=\"message\">";
			$output .= htmlentities($_SESSION["message"]);
			$output .= "</div>";
			$_SESSION["message"] = null;
			return $output;
		}
	}
	function errors() {
		if (isset($_SESSION["errors"])) {
			$errors = $_SESSION["errors"];
			$_SESSION["errors"] = null;
			return $errors;
		}
	}

	
	$timezone = date_default_timezone_set("America/Anchorage");
	$con = mysqli_connect("localhost", "bu", "mGJWUcBVvp0pr90w", "backuptracker2");//make sure to change the username away from root and password
	
	if(mysqli_connect_errno()) {
		echo "failed to connect: " . mysqli_connect_errno();
	}
	
?>

