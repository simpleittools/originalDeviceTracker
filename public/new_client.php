<?php $page_title = "Create Client";?>

<?php
	include("header.php");
?>
<?php confirm_logged_in(); ?>
<?php
	if($permission != 2 && $permission != 3 && $permission != 4){
	
			redirect_to("deny.php");
	
	};
?>
<?php
	if (isset($_POST['submit'])) {
	  // Process the form
	  
	  // validations
	  
	  
	  if (empty($errors)) {
	    // Perform Create
	
	    $client_name = mysql_prep($_POST["client_name"]);
		$result = new_client($client_name);

	
	    if ($result) {
	      // Success
	      $_SESSION["message"] = "New Client Created.";
	      redirect_to("new_location.php");
	    } else {
	      // Failure
	      $_SESSION["message"] = "Create Client Failed.";
	    }
	    
	  }
	} else {
	  // This is probably a GET request
	  
	} // end: if (isset($_POST['submit']))

?>

    <form action="new_client.php" method="post">
      <label for="client_name">Client Name:</label>
        <input class="form-control" type="text" name="client_name" value="" />
      <input class="btn btn-primary"type="submit" name="submit" value="Add Client" />
      <a class="btn btn-danger" href="device_search.php">Cancel</a>
    </form>
    
  
</div>
<?php
	include ("footer.php")
?>