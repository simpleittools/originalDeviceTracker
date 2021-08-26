<?php
	$db = new DbConnect;
	$con = $db->connect();
	if (isset($_POST['submit'])) {
	  // Process the form
	  
	  // validations
	  
	  
	  if (empty($errors)) {
	  	
	  	$data = [
			
		    'location' => $_POST["location"],
		    'street_address' => $_POST["street_address"],
		    'street_address_alt' => $_POST["street_address_alt"],
		    'main_phone' => $_POST["main_phone"],
		    'city' => $_POST["city"],
		    'state' => $_POST["state"],
		    'zip' => $_POST["zip"],
		    'id' => $location["id"],
		    
	  	];
	  	
	  	
	    $update = "UPDATE locations SET location = :location, street_address = :street_address, street_address_alt = :street_address_alt, main_phone = :main_phone, city = :city, state = :state, zip = :zip WHERE id = :id";
	 	$insert = $con->prepare($update);
	    $insert->execute($data);
	  	
		
	
	    if ($insert) {
	      // Success
	      $_SESSION["message"] = "Location updated .";
	      redirect_to_home($actionPage);
	    } else {
	      // Failure
	      $_SESSION["message"] = "Client update failed.";
	    }
	  }
	} else {
	  // This is probably a GET request
	  
	} // end: if (isset($_POST['submit']))

?>

