<?php $page_title = "Client Edit";?>
<?php include("header.php"); ?>
<?php confirm_logged_in(); ?>
<?php
	if($permission < 2){
			redirect_to("deny.php");
		};
		
?>
<?php
  $client = find_client_by_id($_GET["id"]);
  if (!$client) {
    // client ID was missing or invalid or 
    // client couldn't be found in database
    redirect_to("client_list.php");
  }
?>
<?php
if (isset($_POST['submit'])) {
  // Process the form
  
    // validations
  $required_fields = array("client_name");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("client_name" => 200);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    
    // Perform Update

    $id = $client["id"];
	$result = update_client($id);

    if ($result && mysqli_affected_rows($con) == 1) {
      // Success
      $_SESSION["message"] = "Client updated.";
      redirect_to("client_list.php");
    } else {
      // Failure
      $_SESSION["message"] = "Client update failed.";
    }
  
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>
    
    <form class="form-group" action="client_edit.php?id=<?php echo urlencode($client["id"]); ?>" method="post">
    	<label for="client_name">Client:</label>
        	<input type="text" class="form-control" name="client_name" value="<?php echo htmlentities($client["client_name"]); ?>" />
<!--     	<label for="enabled">Enabled:</label>
 			This pulls the names from the status table, and properly changes the status. It does NOT pull the client specific status. I probably need a JOIN to to that
 			
 				<?php 
 					$c_id=$client["id"];
 					$results=client_status($c_id);
 					
				?>
			<select name="enabled" id="status" class="form-control">
				<?php foreach ( $results as $option ) : ?>
		          <option value="<?php echo $option->id; ?>"><?php echo $option->status_name; ?><?php $enabled = $option->id;?></option>
		     	<?php endforeach; ?>
		     	
		     	This pulls the names from the status table, and properly changes the status. It does NOT pull the client specific status. I probably need a JOIN to to that
			</select> 			
        	<?php
        		$c_id = $client["id"];
        		
        		
        		global $con;
        	       			$check = "SELECT enabled FROM clients WHERE id = $c_id";
        	       			$e_status = mysqli_fetch_row($check);
        	       			var_dump($e_status);
        	       			
        	       		?>
        	       		<label for=""><?php echo $c_id; ?></label>
       		<?php /*
        		$query = "UPDATE devices SET ";
        		$query .= "enabled = '{$est_status}'";
        		$query .= "WHERE c_id = {$c_id}";
        		//$end = mysqli_fetch_assoc($con, $query);
        	*/
        	?> -->
			<input class="btn btn-primary" type="submit" name="submit" value="Edit Client" />
	</form>
	<br />
	<a href="client_list.php">Cancel</a>
	</div>
</div>

<?php include("footer.php"); ?>