<?php
	$db = new DbConnect;
	$con = $db->connect();
	if (isset($_POST['submit'])) {
	  // Process the form
	  
	  // validations
	  $required_fields = array("username", "password");
	  validate_presences($required_fields);
	  
	  $fields_with_max_lengths = array("username" => 30);
	  validate_max_lengths($fields_with_max_lengths);
	  
	  if (empty($errors)) {
	    // Perform Create
	
	    $username = $_POST["username"];
	    $hashed_password = password_encrypt($_POST["password"]);
	    $firstname = $_POST["FirstName"];
	    $lastname = $_POST["LastName"];
	    $p_level = $_POST["Permission"];
	    $email = $_POST["email"];
	    $dphone = $_POST["desk_phone"];
	    $cphone = $_POST["cell_phone"];
	    $startPageOption = $_POST["start_page"];
	    
	 	$insert = $con->prepare("INSERT INTO users (username, hashed_password, FirstName, LastName, Permission, email, desk_phone, cell_phone, start_page) VALUES (:username, :hashed_password, :FirstName, :LastName, :Permission, 
	 	:email, :desk_phone, :cell_phone, :start_page)");
	    $insert->bindParam(':username', $username);
	    $insert->bindParam(':hashed_password', $hashed_password);
	    $insert->bindParam(':FirstName', $firstname);
	    $insert->bindParam(':LastName', $lastname);
	    $insert->bindParam(':Permission', $p_level);
	    $insert->bindParam(':email', $email);
	    $insert->bindParam(':desk_phone', $dphone);
	    $insert->bindParam(':cell_phone', $cphone);
	    $insert->bindParam(':start_page', $startPageOption);
	    $insert->execute();
	
	    if ($insert) {
	      // Success
	      $_SESSION["message"] = "User created.";
	      redirect_to("userManagement.php");
	    } else {
	      // Failure
	      $_SESSION["message"] = "User creation failed.";
	    }
	  }
	} else {
	  // This is probably a GET request
	  
	} // end: if (isset($_POST['submit']))

?>