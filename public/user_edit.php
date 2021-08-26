<?php $page_title = "User Edit"; ?>
<?php include("header.php"); ?>
<?php confirm_logged_in(); ?>

<?php
	$user_id = $_SESSION['user_id'];
		global $con;
		$query  = "SELECT Permission ";
		$query .= "FROM users ";
		$query .= "WHERE id = {$user_id} ";
		$query .= "LIMIT 1";
		$permission_set = mysqli_query($con, $query);
		while($rows = mysqli_fetch_array($permission_set)){
			$permission=$rows['Permission'];
		if($permission < 3){
			redirect_to("deny.php");
		};
		};
?>
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
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    
    // Perform Update

    $id = $user["id"];
    $user = mysql_prep($_POST["username"]);
    $FirstName = mysql_prep($_POST["FirstName"]);
    $LastName = mysql_prep($_POST["LastName"]);
   // $Permission = mysql_prep($_POST["Permission"]);
    $hashed_password = password_encrypt($_POST["password"]);
    $user_email = mysql_prep($_POST['email']);
    $desk_phone = mysql_prep($_POST['desk_phone']);
    $cell_phone = mysql_prep($_POST['cell_phone']);
  
    $query  = "UPDATE users SET ";
    $query .= "FirstName = '{$FirstName}', ";
    $query .= "LastName = '{$LastName}', ";
    //$query .= "Permission = '{$Permission}', ";
    $query .= "username = '{$user}', ";
    $query .= "hashed_password = '{$hashed_password}', ";
    $query .= "email = '{$user_email}', ";
    $query .= "desk_phone = '{$desk_phone}', ";
    $query .= "cell_phone = '{$cell_phone}'";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_affected_rows($con) == 1) {
      // Success
      $_SESSION["message"] = "User updated.";
      redirect_to("user_list.php");
    } else {
      // Failure
      $_SESSION["message"] = "User update failed.";
    }
  
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>


		<?php $p_id = $user["Permission"]?>

  <div id="page" class="container">
    
    
    
    
    <form class="form-group" action="user_edit.php?id=<?php echo urlencode($user["id"]); ?>" method="post">
    	<label for="FirstName">First Name:</label>
        	<input type="text" class="form-control" name="FirstName" id="FirstName" value="<?php echo htmlentities($user["FirstName"]); ?>" />
        	<hr>
    	<label for="LastName">Last Name:</label>
        	<input type="text" class="form-control" name="LastName" id="LastName" value="<?php echo htmlentities($user["LastName"]); ?>" />
        	<hr>
    <!--<label for="Permission">Permission:</label>
    	
 
      
		<select name="Permission" id="Permission" class="form-control">
			
			<?php
				global $con;
		
				$query  = "SELECT * ";
				$query .= "FROM permissions ";
				$execute = mysqli_query($con, $query);
				while ($results[] = mysqli_fetch_object ($execute));
				array_pop ($results);

			?>
			
		     <?php foreach ( $results as $option ) {
		     	if ($p_id === $option->id) {
		     		echo "<option value = ".$option->id." selected'>".$option->id."</option>";
		     	} else {
		     		echo "<option value='".$option->id."'>".$option->id."</option>";
		     	}
		     }
		     ?>
		          
		    
		</select>-->

    	<label for="username">Username:</label>
			<input type="text" class="form-control" name="username" id="username" value="<?php echo htmlentities($user["username"]); ?>" />
			<hr>
		<label for="password">Password:</label>
			<input type="password" class="form-control" name="password" id="password" value="" />
			<hr>
		<label for="email">Email:</label>
			<input type="email" class="form-control" name="email" value="<?php echo htmlentities($user['email']); ?>" />
			<hr>
		<label for="desk_phone">Desk Phone:</label>
			<input type="tel" class="form-control" name="desk_phone" value="<?php echo htmlentities($user['desk_phone']); ?>" />
			<hr>
		<label for="cell_phone">Cell Phone:</label>
			<input type="tel" class="form-control" name="cell_phone" value="<?php echo htmlentities($user['cell_phone']); ?>" />
			<hr>
		
			<input class="btn btn-primary" type="submit" name="submit" value="Edit User" />
			<a class="btn btn-danger" href="javascript:history.back()">Cancel</a>
	</form>
	
	</div>
</div>

<?php include("footer.php"); ?>