<?php $page_title = "Create User";?>
<?php include("header.php"); ?>
<?php confirm_logged_in(); ?>


<!--
	THIS CHECKS USER PERMISSIONS
-->
<?php
	if($permission < 3){
		redirect_to("deny.php");
	};
?>
		

<!--
	THIS ADDS USERS TO THE DATABASE
-->	

<?php
	if (isset($_POST['submit'])) {
	  // Process the form
	  
	  // validations
	  $required_fields = array("username", "password");
	  validate_presences($required_fields);
	  
	  $fields_with_max_lengths = array("username" => 30);
	  validate_max_lengths($fields_with_max_lengths);
	  
	  if (empty($errors)) {
	    // Perform Create
	
	    $username = mysql_prep($_POST["username"]);
	    $hashed_password = password_encrypt($_POST["password"]);
	    $firstname = mysql_prep($_POST["FirstName"]);
	    $lastname = mysql_prep($_POST["LastName"]);
	    $p_level = mysql_prep($_POST["Permission"]);
	    $email = mysql_prep($_POST["email"]);
	    $dphone = mysql_prep($_POST["desk_phone"]);
	    $cphone = mysql_prep($_POST["cell_phone"]);
	    
	    $query  = "INSERT INTO users (";
	    $query .= "  username, hashed_password, FirstName, LastName, Permission, email, desk_phone, cell_phone";
	    $query .= ") VALUES (";
	    $query .= "  '{$username}', '{$hashed_password}', '{$firstname}', '{$lastname}', '{$p_level}', '{$email}', '{$dphone}', '{$cphone}'";
	    $query .= ")";
	    $result = mysqli_query($con, $query);
	
	    if ($result) {
	      // Success
	      $_SESSION["message"] = "User created.";
	      redirect_to("index.php");
	    } else {
	      // Failure
	      $_SESSION["message"] = "User creation failed.";
	    }
	  }
	} else {
	  // This is probably a GET request
	  
	} // end: if (isset($_POST['submit']))

?>

  <div id="page">
    
    
    <form action="new_user.php" method="post">
      <label for="username">Username:</label>
        <input class="form-control" type="text" name="username" value="" /><br class="input-form">
      
      <label for="password">Password:</label>
        <input class="form-control" type="password" name="password" value="" /><br class="input-form">
      <label for="FirstName">First Name:</label>
      	<input class="form-control" type="text" name="FirstName" value="" /><br class="input-form">
      <label for="LastName">Last Name:</label>
      	<input class="form-control" type="text" name="LastName" value="" /><br class="input-form">
      <label for="email">Email Address:</label>
      	<input class="form-control"type="email" name='email' value="" /><br class="input-form">
  	<label for="desk_phone">Desk Phone:</label>
      	<input class="form-control"type="tel" name='desk_phone' value="" /><br class="input-form">
  	<label for="cell_phone">Cell Phone:</label>
      	<input class="form-control"type="tel" name='cell_phone' value="" /><br class="input-form">
      <label for="Permission">Permission:</label>
      				<?php global $con;
		
					     $query = "SELECT * FROM permissions";
					     $execute = mysqli_query($con, $query);
					     while ( $results[] = mysqli_fetch_object ( $execute ) );
					     array_pop ( $results );
					?>
		<select name="Permission" class="form-control">
		     <?php foreach ( $results as $option ) : ?>
		          <option value="<?php echo $option->level_id; ?>"><?php echo $option->level; ?><?php $p_level = $option->level_id;?></option>
		     <?php endforeach; ?>
		</select>
      <input class="btn btn-primary"type="submit" name="submit" value="Create User" />
       <a class="btn btn-danger" href="device_search.php">Cancel</a>
    </form>
   
  </div>
</div>
<?php include("footer.php"); ?>