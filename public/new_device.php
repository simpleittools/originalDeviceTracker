<?php $page_title = "Create Backup Device";?>

<?php include("header.php");?>
<?php confirm_logged_in(); ?>

<?php
	
	if (isset($_POST['submit'])) {
	  // Process the form
	  
	  // validations
	  
	  
	  if (empty($errors)) {
	    // Perform Create
	
	    $device_name = mysql_prep($_POST["device_name"]);
	    $serial_number = mysql_prep($_POST["serial_number"]);
	    $device_type = mysql_prep($_POST["device_type"]);
	    $c_id = mysql_prep($_POST["c_id"]);
	    $status = mysql_prep($_POST["status"]);
	    $user_id = $_SESSION['user_id'];
	    
	    
	    $query  = "INSERT INTO devices (";
	    $query .= "  device_name, serial_number, device_type, enabled, c_id, status, change_by_id";
	    $query .= ") VALUES (";
	    $query .= "  '{$device_name}', '{$serial_number}', '{$device_type}', '1', '{$c_id}', '{$status}', '{$user_id}'";
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


  <div id="page">

    <form action="new_device.php" method="post">
    	<label for="c_id">Client:</label>
 					<!--
 						DATABASE connection to pull all details from clients
 					-->   
    				<?php global $con;
		
					     $query = "SELECT * FROM clients ORDER BY client_name ASC";
					     $execute = mysqli_query($con, $query);
					     while ( $results[] = mysqli_fetch_object ( $execute ) );
					     array_pop ( $results );
					?>
    			
    		
    		<select name="c_id" class="form-control">
    			<!--
 					Dropdown menu for users to select a client name from the database connection found above
 				-->  
		     <?php foreach ( $results as $option ) : ?>
		          <option value="<?php echo $option->id; ?>"><?php echo $option->client_name; ?><?php $c_id = $option->id;?></option>
		     <?php endforeach; ?>
			</select>
    	<label for="device_name">Device Name:</label>
    			<input class="form-control shadow-box" type="text" onkeypress="return tabE(this,event)" name="device_name" value="" />
    		<label for="serial_number">Serial Number:</label>
      		<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="serial_number" value="" />
    	<label for="device_type">Device Type:</label>
      		<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="device_type" value="" />
    	
      	<!-- 	<input class="form-control" type="text" name="c_id" value="" /> -->
      	<?php if ($permission >= 2){?><label for="status">Status:</label>
 					<!--
 						DATABASE connection to pull all details from status
 					-->   
    				<?php global $con;
		
					     $query2 = "SELECT * FROM device_status ORDER BY id ASC LIMIT 5";
					     $execute2 = mysqli_query($con, $query2);
					     while ( $result2[] = mysqli_fetch_object ( $execute2 ) );
					     array_pop ( $result2 );
					?>
    			
    		
    		<select name="status" class="form-control">
    			<!--
 					Dropdown menu for users to select a client name from the database connection found above
 				-->  
		     <?php foreach ( $result2 as $option2 ) : ?>
		          <option value="<?php echo $option2->id; ?>"><?php echo $option2->status; ?><?php $status = $option2->id;?></option>
		     <?php endforeach; ?>
			</select><?php } else {?><input class="hidden" type='text' name='status' value=1 /><?php };?>
    	<input class="btn btn-primary"type="submit" name="submit" value="Add Device" />
    	<a class="btn btn-danger" href="device_search.php">Cancel</a>
    </form>
  </div>
</div>
<?php
	include ("footer.php")
?>