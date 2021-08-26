<?php
	include("header.php");
?>
<?php confirm_logged_in(); ?>
<?php
	if (isset($_POST['submit'])) {
	  // Process the form
	  
	  // validations
	  
	  
	  if (empty($errors)) {
	    // Perform Create
	
	    $reported_by_id = $_SESSION['user_id'];
	    $date = date("Y.m.d");
	    $description = mysql_prep($_POST["description"]);

	    
	    
	    $query  = "INSERT INTO bugfix (";
	    $query .= "  reported_by_id, date, description, status";
	    $query .= ") VALUES (";
	    $query .= "  '{$reported_by_id}', '{$date}', '{$description}', '1'";
	    $query .= ")";
	    $result = mysqli_query($con, $query);
	
	    if ($result) {
	      // Success
	      $_SESSION["message"] = "device created.";
	      redirect_to("device_search.php");
	    } else {
	      // Failure
	      $_SESSION["message"] = "Device creation failed.";
	    }
	  }
	} else {
	  // This is probably a GET request
	  
	} // end: if (isset($_POST['submit']))

?>
<div id="main">
  <div id="navigation">
    &nbsp;
  </div>
  <div class="container col-lg-4"id="page">
    
    <h2>Bug Fix</h2>
    <form action="bug_fix.php" method="post">
    	<label for="description">Bug Fix:</label>
		<textarea class="form-control" name="description"></textarea>

      	<!-- 	<input class="form-control" type="text" name="c_id" value="" /> -->
    	<input class="btn btn-submit"type="submit" name="submit" value="Submit" />
    	<a class="btn btn-danger" href="device_search.php">Cancel</a>
    </form>
  </div>
</div>
<?php
	include ("footer.php")
?>