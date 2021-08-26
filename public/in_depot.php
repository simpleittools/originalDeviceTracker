<?php $page_title = "In Depot Form";?>
<?php include("header.php"); ?>
<?php confirm_logged_in(); ?>

    <form action="in_depot.php" method="post">
    	<label for="depotNumber">In Depot #:</label>
    	<input type="text" id="depotNumber" name="depotNumber" class="form-control" onkeypress="return tabE(this,event)" placeholder="AutoNumber">
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
      	<!-- 	<input class="form-control" type="text" name="c_id" value="" /> -->
    	
    	<label for="device_type">Device Type:</label>
      		<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="device_type" value="" />
    	<label for="serial_number">Serial Number:</label>
      		<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="serial_number" value="" />
    	
    	
    	<input class="btn btn-primary"type="submit" name="submit" value="Add Device" />
    	<a class="btn btn-danger" href="#">Cancel</a>
    </form>
  </div>
</div>
<?php include("footer.php"); ?>