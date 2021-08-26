<?php
$username = "";

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Attempt Login

		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$found_user = attempt_login($username, $password);

    if ($found_user) {
      // Success
			// Mark user as logged in
		$_SESSION["user_id"] = $found_user["id"];
		$_SESSION["username"] = $found_user["username"];
		if(isset($found_user['start_page']) && strlen($found_user['start_page']) > 0){
			$start_page = $found_user['start_page'];
  			redirect_to($start_page);
		} else {
			redirect_to("backupDeviceSearch.php");
		}
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>