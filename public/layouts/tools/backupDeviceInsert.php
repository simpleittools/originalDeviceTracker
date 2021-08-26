<?php
	$db = new DbConnect;
	$con = $db->connect();
/*This whole section needs to be moved to a function. backup_device_insert()*/
	/*$stmt = backup_device_insert();
	$stmt->bindParam(':device_name', $device_name);
	$stmt->bindParam(':serial_number', $serial_number);
	$stmt->bindParam(':device_type', $device_type);
	$stmt->bindParam(':c_id', $c_id);
	$stmt->bindParam(':status', $status);*/
	if (isset($_POST['submit'])) {
	  // Process the form
	  
	  // validations
	  
	  
	  if (empty($errors)) {
	  	$device_name = $_POST["device_name"];
		$serial_number = $_POST["serial_number"];
		$device_type = $_POST["device_type"];
		$c_id = $_POST["c_id"];
		$status = $_POST["status"];
		//$user_id = $_SESSION['user_id'];
		//$result = backup_device_insert($stmt);
	    // Perform Create
	    $stmt= $con->prepare(
					"INSERT INTO devices (device_name, serial_number, device_type, enabled, c_id, status, change_by_id)
					VALUES (:device_name, :serial_number, :device_type, 1, :c_id, :status, :change_by_id)");
		
	    $stmt->bindParam(':device_name', $device_name);
	    $stmt->bindParam(':serial_number', $serial_number);
	    $stmt->bindParam(':device_type', $device_type);
	    $stmt->bindParam(':c_id', $c_id);
	    $stmt->bindParam(':status', $status);
	    $stmt->bindParam(':change_by_id', $user_id);
	    $stmt->execute();
		
		
		
		
		if ($stmt) {
			      // Success
			      $_SESSION["message"] = "device created.";
			      redirect_to("createBackupDevice.php?id=$c_id");
			    } else {
			      // Failure
			      $_SESSION["message"] = "Device creation failed.";
			    }
			  }
			} else {
			  // This is probably a GET request
			  
			}//  end: if (isset($_POST['submit']))
?>