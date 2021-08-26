<?php
	$db = new DbConnect;
	$con = $db->connect();
	if (isset($_POST['submit'])) {
	  // Process the form
	  
	  // validations
	  
	  
	  if (empty($errors)) {
	  	
	  	$data = [
			
		    'client_name' => $_POST["client_name"],
		    'enabled' => $_POST["enabled"],
		    'id' => $client["id"],
	  	];
	  	
	  	
	    $update = "UPDATE clients SET client_name = :client_name, enabled = :enabled WHERE id = :id";
	 	$insert = $con->prepare($update);
	    $insert->execute($data);
	  	
		
	
	    if ($insert) {
	      // Success
	      $_SESSION["message"] = "Client updated";
	      redirect_to_home($actionPage);
	      exit();
	    } else {
	      // Failure
	      $_SESSION["message"] = "Client update failed.";
	      exit();
	    }
	  }
	} else {
	  // This is probably a GET request
	  
	} // end: if (isset($_POST['submit']))

?>