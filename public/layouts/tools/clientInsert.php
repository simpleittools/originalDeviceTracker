<?php
	$db = new DbConnect;
	$con = $db->connect();
	if (isset($_POST['submit'])) {
	  // Process the form
	  
	  // validations
	  
	  
	  if (empty($errors)) {
	    // Perform Create
	    $client_name = $_POST["client_name"];
		
		
		$insert= $con->prepare("INSERT INTO clients (client_name, enabled) VALUES (:client_name, 1)");
		$insert->bindParam(':client_name', $client_name);
		$insert->execute(); 
		$c_id = $con->lastInsertId();
	
	    if ($insert) {
	      // Success
	      $_SESSION["message"] = "New Client Created.";
	      redirect_to("addLocation.php?id=$c_id");
	    } else {
	      // Failure
	      $_SESSION["message"] = "Create Client Failed.";
	    }
	    
	  }
	} else {
	  // This is probably a GET request
	  
	} // end: if (isset($_POST['submit']))

?>