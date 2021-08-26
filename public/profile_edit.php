<?php $page_title = "Edit Profile"; ?>
<?php include("header.php"); ?>
<?php confirm_logged_in(); ?>

<?php
  $user = find_user_by_id($_GET["id"]);
  
  if (!$user) {
    // admin ID was missing or invalid or 
    // admin couldn't be found in database
    redirect_to("user_list.php");
  }
?>
<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
	$required_fields = array("username");
	validate_presences($required_fields);
  
	$fields_with_max_lengths = array("username" => 30);
	validate_max_lengths($fields_with_max_lengths);
  
	//if (empty($errors)) {
    
    // Perform Update

	    $id = $user["id"];
	    $user = mysql_prep($_POST["username"]);
	    $FirstName = mysql_prep($_POST["FirstName"]);
	    $LastName = mysql_prep($_POST["LastName"]);
	    $Permission = mysql_prep($_POST["Permission"]);
	    
	    $user_email = mysql_prep($_POST['email']);
	    $desk_phone = mysql_prep($_POST['desk_phone']);
	    $cell_phone = mysql_prep($_POST['cell_phone']);
	    
	    
	  
	    $query  = "UPDATE users SET ";
	    $query .= "username = '{$user}', ";
	    if (isset($_POST['password'])){
			$hashed_password = password_encrypt($_POST["password"]);
			$query .= "hashed_password = '{$hashed_password}', ";
		
		};
	    $query .= "email = '{$user_email}', ";
	    $query .= "desk_phone = '{$desk_phone}', ";
	    $query .= "cell_phone = '{$cell_phone}'";
	    $query .= "WHERE id = {$id} ";
	    $query .= "LIMIT 1";
	    $result = mysqli_query($con, $query);
		
	    if ($result && mysqli_affected_rows($con) == 1) {
	      // Success
	      $_SESSION["message"] = "User updated.";
	      redirect_to("device_search.php");
	    } else {
	      // Failure
	      $_SESSION["message"] = "User update failed.";
	    }
  
	//}
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>


  <div id="page">
    
    
    
   
    <form class="form-group" action="profile_edit.php?id=<?php echo urlencode($user["id"]); ?>" method="post">
    	<label for="username">Username:</label>
			<input type="text" class="form-control" name="username" value="<?php echo htmlentities($user['username']); ?>">
		<label for="password">Password:</label>
			<input type="password" class="form-control" name="password">
		<label for="email">Email:</label>
			<input type="email" class="form-control" name="email" value="<?php echo htmlentities($user['email']); ?>">
		<label for="desk_phone">Desk Phone:</label>
			<input type="tel" class="form-control" name="desk_phone" value="<?php echo htmlentities($user['desk_phone']); ?>">
		<label for="cell_phone">Cell Phone:</label>
			<input type="tel" class="form-control" name="cell_phone" value="<?php echo htmlentities($user['cell_phone']); ?>">
		
			<input class="btn btn-primary" type="submit" name="submit" value="Edit User" />
			<a class="btn btn-danger" href="device_search.php">Cancel</a>
	</form>
	
	</div>
</div>

<?php include("footer.php"); ?>