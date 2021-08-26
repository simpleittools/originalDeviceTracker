<?php
	$db = new DbConnect;
	$con = $db->connect();
	if (isset($_POST['submit'])) {
	  // Process the form
	  
	  // validations
	  $required_fields = array("username");
	  validate_presences($required_fields);
	  
	  $fields_with_max_lengths = array("username" => 30);
	  validate_max_lengths($fields_with_max_lengths);
	  
	  if (empty($errors)) {
	    // Perform Create
		$data = [
			
		    'username' => $_POST["username"],
		   /*$hashed_password = password_encrypt($_POST["password"]);*/
		    'FirstName' => $_POST["FirstName"],
		   	"LastName" => $_POST["LastName"],
		    
		   	'email' => $_POST["email"],
		    'desk_phone' => $_POST["desk_phone"],
		    'cell_phone' => $_POST["cell_phone"],
		    'id' => $user["id"],
		    'Permission' => $_POST['Permission'],
		    'start_page' => $_POST['start_page'],
	  	];
	    $update = "UPDATE users SET username = :username, FirstName = :FirstName, LastName = :LastName, email = :email, desk_phone = :desk_phone, cell_phone = :cell_phone, Permission = :Permission, start_page = :start_page WHERE id = :id";
	 	$insert = $con->prepare($update);
	    $insert->execute($data);
	
	    if ($insert) {
	      // Success
	      $_SESSION["message"] = "User updated .";
	      redirect_to_home($home);
	    } else {
	      // Failure
	      $_SESSION["message"] = "User update failed.";
	    }
	  }
	} else {
	  // This is probably a GET request
	  
	} // end: if (isset($_POST['submit']))

?>

