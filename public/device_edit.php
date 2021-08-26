<?php $page_title = "Edit Device:";?>
<?php include("header.php"); ?>
<?php confirm_logged_in(); ?>
<?php
	if($permission != 3 && $permission !=4){
		redirect_to("deny.php");
	};
?>
<?php

	$device = find_device_by_id($_GET["id"]);
	if (!$device) {
    // Device ID was missing or invalid or 
    // Device couldn't be found in database
    redirect_to("mgr_override.php");
  }
?>
<?php
if (isset($_POST['submit'])) {
  // Process the form
  
    // validations
  $required_fields = array("device_name", "serial_number");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("device_name" => 200);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    
    // Perform Update

    $id = $device["id"];
    $device_name = mysql_prep($_POST["device_name"]);
    $serial_number = mysql_prep($_POST["serial_number"]);
    $c_id = mysql_prep($_POST["c_id"]);
    $status = mysql_prep($_POST['status']);
    $change_by_id = mysql_prep($_POST['change_by_id']);
    
  
    $query  = "UPDATE devices SET ";
    $query .= "device_name = '{$device_name}', ";
    $query .= "serial_number = '{$serial_number}',";
    $query .= "status = '{$status}',";
    $query .= "change_by_id = '{$change_by_id}',";
    $query .= "c_id = '{$c_id}'";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_affected_rows($con) == 1) {
      // Success
      $_SESSION["message"] = "Device updated.";
      redirect_to("mgr_override.php");
    } else {
      // Failure
      $_SESSION["message"] = "Device update failed.";
    }
  
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>
<!-- This script changes Enter to Tab. The 'onkeypress="return tabE(this,event)"' Needs to be added to any input field-->
<script type="text/javascript"> 
	function tabE(obj,e){ 
		var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
		if(e.keyCode==13){ 
			var ele = document.forms[0].elements; 
			for(var i=0;i<ele.length;i++){ 
				var q=(i==ele.length-1)?0:i+1;// if last element : if any other 
				if(obj==ele[i]){ele[q].focus();break} 
			} 
			return false; 
		} 
	}
</script>


    <?php
				global $con;
		
				$query  = "SELECT * ";
				$query .= "FROM clients ";
				$query .= "ORDER BY client_name";
				$execute = mysqli_query($con, $query);
				while ($results[] = mysqli_fetch_object ($execute));
				array_pop ($results);

	?>
    
    <?php $client_id = $device["c_id"];?>
	<?php $status_id = $device['status'];?>
	<?php $change_by_id = $device['change_by_id'];?>
 
    <form class="form-group" action="device_edit.php?id=<?php echo urlencode($device["id"]); ?>" method="post">
    	<label for="device_name">Device:</label>
        	<input type="text" class="form-control" name="device_name" onkeypress="return tabE(this,event)" value="<?php echo htmlentities($device["device_name"]); ?>" />
    	<label for="serial_number">Serial Number:</label>
        	<input type="text" class="form-control" name="serial_number" onkeypress="return tabE(this,event)" value="<?php echo htmlentities($device["serial_number"]); ?>" />
	
			
		<label for="c_id">Client:</label>
		<select name="c_id" id="c_id" class="form-control">
			
			
			<?php foreach ( $results as $option ) {
		     	if ($client_id == $option->id) {
		     		echo "<option value = ".$option->id." selected '>".$option->client_name."</option>";
		     	} else {
		     		echo "<option value='".$option->id."'>".$option->client_name."</option>";
		     	}
		     }
		     ?>
		</select>
		<label for="status">Status:</label>
 					<!--
 						DATABASE connection to pull all details from status
 					-->   
    				<?php global $con;
		
					     $query2 = "SELECT * FROM device_status";
					     $execute2 = mysqli_query($con, $query2);
					     while ( $result2[] = mysqli_fetch_object ( $execute2 ) );
					     array_pop ( $result2 );
					?>
    			
    		
    		<select name="status" id="status" class="form-control">
    			<!--
 					Dropdown menu for users to select the status from the database connection found above
 				-->  
 			<?php foreach ( $result2 as $option ) {
		     	if ($status_id == $option->id) {
		     		echo "<option value = ".$option->id." selected '>".$option->status."</option>";
		     	} else {
		     		echo "<option value='".$option->id."'>".$option->status."</option>";
		     	}
		     }
		     ?>
			</select>		
		<label for="change_by_id">Change By:</label>
			<select name="change_by_id" id="change_by_id" class="form-control">
    			<?php
						
				global $con;
		
				$query  = "SELECT * ";
				$query .= "FROM users ";
				$query .= "ORDER BY FirstName";
				$execute = mysqli_query($con, $query);
				while ($user_result[] = mysqli_fetch_object ($execute));
				array_pop ($user_result);

				?>
	
				<?php foreach ( $user_result as $option ) {
		     	if ($change_by_id == $option->id) {
		     		echo "<option value = ".$option->id." selected '>".$option->FirstName."</option>";
		     	} else {
		     		echo "<option value='".$option->id."'>".$option->FirstName."</option>";
		     	}
		     }
		     ?>
			</select>
			</select>

		  
		<input class="btn btn-primary" type="submit" name="submit" value="Edit Device" />
		<a href="mgr_override.php" class="btn btn-danger">Cancel</a>
	</form>
	<br />
	
	</div>
</div>

<?php include("footer.php"); ?>