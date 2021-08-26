<?php
	$db = new DbConnect;
	$con = $db->connect();
	if (isset($_POST['submit'])) {
	  // Process the form
	  
	  // validations
	  
	  
	  if (empty($errors)) {
	  	// Perform Create
	  	if(isset($_GET['id'])){
	    	$c_id = $_GET['id'];
	    } else {
		$c_id = $_POST['c_id'];
	    };
	  	$c_device_name = $_POST["c_device_name"];
		$c_device_sn = $_POST["c_device_sn"];
		$c_device_type = $_POST["c_device_type"];
		$c_id = $_POST["c_id"];
		$status = $_POST["status"];
		$c_device_issue_to = $_POST['c_device_issue_to'];
		$location = $_POST['location'];
		
		//$user_id = $_SESSION['user_id'];
		//$result = backup_device_insert($stmt);
	    // Perform Create
	    $stmt= $con->prepare(
					"INSERT INTO client_devices (c_device_name, c_device_sn, c_device_type, c_id, status, c_device_issue_to, location, issue_by_id)
					VALUES (:c_device_name, :c_device_sn, :c_device_type, :c_id, :status, :c_device_issue_to, location, 1)");
		
	    $stmt->bindParam(':device_name', $c_device_name);
	    $stmt->bindParam(':serial_number', $c_device_sn);
	    $stmt->bindParam(':c_device_type', $c_device_type);
	    $stmt->bindParam(':c_id', $c_id);
	    $stmt->bindParam(':status', $status);
	    $stmt->bindParam(':c_device_issue_to', $c_device_issue_to);
	    $stmt->bindParam(':location', $location);
	    
	    
	    //$stmt->bindParam(':change_by_id', $user_id);
	    $stmt->execute();
		
		
		
		
		if ($stmt) {
			      // Success
			      $_SESSION["message"] = "device created.";
			      redirect_to("addClientDevice.php?id=$c_id");
			    } else {
			      // Failure
			      $_SESSION["message"] = "Device creation failed.";
			    }
			  }
			} else {
			  // This is probably a GET request
			  
			}//  end: if (isset($_POST['submit']))
?>