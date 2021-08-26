<?php
	$db = new DbConnect;
	$con = $db->connect();
	if (isset($_POST['submit'])) {
	  // Process the form
	  
	    // validations
	  $required_fields = array("device_name", "serial_number");
	  validate_presences($required_fields);
	  
	  $fields_with_max_lengths = array("device_name" => 200);
	  validate_max_lengths($fields_with_max_lengths);
	  
	  if (empty($errors)) {
	    
	    // Perform Update
		$data = [
		    'id' => $device["id"],
	    	'device_name' => $_POST["device_name"],
	    	'serial_number' => $_POST["serial_number"],
	    	'c_id' => $_POST["c_id"],
	    	'status' => $_POST['status'],
	    	'change_by_id' => $_POST['change_by_id'],	
		];
	
	    
	  
	    $update  = "UPDATE devices SET device_name = :device_name, serial_number = :serial_number, status = :status, change_by_id = :change_by_id, c_id = :c_id WHERE id = :id LIMIT 1";
	    $insert = $con->prepare($update);
	    $insert->execute($data);
	
	    if ($insert) {
	      // Success
	      $_SESSION["message"] = "Device updated.";
	      redirect_to($home);
	    } else {
	      // Failure
	      $_SESSION["message"] = "Device update failed.";
	    }
	  
	  }
	} else {
	  // This is probably a GET request
	  
	} // end: if (isset($_POST['submit']))

?>
