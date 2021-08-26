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
	    $location = $_POST['location'];
	    $street_address = $_POST['street_address'];
	    $street_address_alt = $_POST['street_address_alt'];
	    $main_phone = $_POST['main_phone'];
	    $city = $_POST['city'];
	    $state = $_POST['state'];
	    $zip = $_POST['zip'];
		
		$insert= $con->prepare("INSERT INTO locations (c_id, location, street_address, street_address_alt, main_phone, city, state, zip) VALUES (:c_id, :location, :street_address, :street_address_alt, :main_phone,
		:city, :state, :zip)");
		$insert->bindParam(':c_id', $c_id);
		$insert->bindParam(':location', $location);
		$insert->bindParam(':street_address', $street_address);
		$insert->bindParam(':street_address_alt', $street_address_alt);
		$insert->bindParam(':main_phone', $main_phone);
		$insert->bindParam(':city', $city);
		$insert->bindParam(':state', $state);
		$insert->bindParam(':zip', $zip);
		$insert->execute(); 
	
	    if ($insert) {
	      // Success
	      $_SESSION["message"] = "New Location Created.";
	      redirect_to("addLocation.php?id=$c_id");
	    } else {
	      // Failure
	      $_SESSION["message"] = "Create Location Failed.";
	    }
	    
	  }
	} else {
	  // This is probably a GET request
	  
	} // end: if (isset($_POST['submit']))

?>