<?php
	$db = new DbConnect;
	$con = $db->connect();
	if (isset($_POST['submit'])) {
	  // Process the form
	  
	  // validations
	  $required_fields = array("password");
	  validate_presences($required_fields);
	  

	  
	  if (empty($errors)) {
	    // Perform Create
		$data = [
		   	'hashed_password' => password_encrypt($_POST["password"]),
		   	'id' => $user_id,
	  	];
	    $update = "UPDATE users SET hashed_password = :hashed_password WHERE id = :id";
	 	$insert = $con->prepare($update);
	    $insert->execute($data);
	
	    if ($insert) {
	      // Success
	      $_SESSION["message"] = "Password updated .";
	      redirect_to_home($home);
	      exit();
	      echo $_SESSION['message'];
	    } else {
	      // Failure
	      $_SESSION["message"] = "Password update failed.";
	      exit();
	      echo $_SESSION['message'];
	    }
	  }
	} else {
	  // This is probably a GET request
	  
	} // end: if (isset($_POST['submit']))

?>