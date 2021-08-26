<?php $page_title = "New Location";?>

<?php include("header.php");?>
<?php confirm_logged_in(); ?>

<?php
	
	if (isset($_POST['submit'])) {
	  // Process the form
	  
	  // validations
	  
	  
	  if (empty($errors)) {
	    // Perform Create
	
	    $location = mysql_prep($_POST["location"]);
	    $street_address = mysql_prep($_POST["street_address"]);
	    $street_address_alt = mysql_prep($_POST["street_address_alt"]);
	    $c_id = mysql_prep($_POST["c_id"]);
	    $main_phone = mysql_prep($_POST["main_phone"]);
	    $city = mysql_prep($_POST["city"]);
	    $state = mysql_prep($_POST["state"]);
	    $zip = mysql_prep($_POST["zip"]);
	    
	    
	    
	    $query  = "INSERT INTO locations (";
	    $query .= "  location, street_address, street_address_alt, c_id, main_phone, city, state, zip";
	    $query .= ") VALUES (";
	    $query .= "  '{$location}', '{$street_address}', '{$street_address_alt}', '{$c_id}', '{$main_phone}', '{$city}', '{$state}', '{$zip}'";
	    $query .= ")";
	    $result = mysqli_query($con, $query);
	
	    if ($result) {
	      // Success
	      $_SESSION["message"] = "Location created.";
	      redirect_to("device_search.php");
	    } else {
	      // Failure
	      $_SESSION["message"] = "Location creation failed.";
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

    <form action="new_location.php" method="post">
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
    	<label for="location">Location Name:</label>
    	<input type="text" class='form-control' name="location" onkeypress="return tabE(this,event)"placeholder="Location Name" required>
    	<label for="street_address">Street Address:</label>
    	<input type="text" class='form-control' name="street_address" onkeypress="return tabE(this,event)"placeholder="e.g. 123 Main Street"required>
    	<label for="street_address_alt">Address 2:</label>
    	<input type="text" class='form-control' name="street_address_alt" onkeypress="return tabE(this,event)"placeholder="Suite 111">
    	<label for="city">City</label>
    	<input type="text" name="city" onkeypress="return tabE(this,event)" class="form-control" required>
    	<label for="state">State</label>
    	<select name="state" onkeypress="return tabE(this,event)" class="form-control" required>
			<option value="AL">AL</option>
			<option value="AK" selected>AK</option>
			<option value="AR">AR</option>	
			<option value="AZ">AZ</option>
			<option value="CA">CA</option>
			<option value="CO">CO</option>
			<option value="CT">CT</option>
			<option value="DC">DC</option>
			<option value="DE">DE</option>
			<option value="FL">FL</option>
			<option value="GA">GA</option>
			<option value="HI">HI</option>
			<option value="IA">IA</option>	
			<option value="ID">ID</option>
			<option value="IL">IL</option>
			<option value="IN">IN</option>
			<option value="KS">KS</option>
			<option value="KY">KY</option>
			<option value="LA">LA</option>
			<option value="MA">MA</option>
			<option value="MD">MD</option>
			<option value="ME">ME</option>
			<option value="MI">MI</option>
			<option value="MN">MN</option>
			<option value="MO">MO</option>	
			<option value="MS">MS</option>
			<option value="MT">MT</option>
			<option value="NC">NC</option>	
			<option value="NE">NE</option>
			<option value="NH">NH</option>
			<option value="NJ">NJ</option>
			<option value="NM">NM</option>			
			<option value="NV">NV</option>
			<option value="NY">NY</option>
			<option value="ND">ND</option>
			<option value="OH">OH</option>
			<option value="OK">OK</option>
			<option value="OR">OR</option>
			<option value="PA">PA</option>
			<option value="RI">RI</option>
			<option value="SC">SC</option>
			<option value="SD">SD</option>
			<option value="TN">TN</option>
			<option value="TX">TX</option>
			<option value="UT">UT</option>
			<option value="VT">VT</option>
			<option value="VA">VA</option>
			<option value="WA">WA</option>
			<option value="WI">WI</option>	
			<option value="WV">WV</option>
			<option value="WY">WY</option>
		</select>		
    	<label for="zip">Zip Code</label>
    	<input type="text" name="zip" onkeypress="return tabE(this,event)" class="form-control" required>
    	<label for="main_phone">Main Phone:</label><span class='note'>&nbsp;&nbsp;&nbsp;&nbsp;Format: xxx-xxx-xxxx</span>
    	<input type="tel" class='form-control' pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="main_phone" onkeypress="return tabE(this,event)">
    	<input class="btn btn-primary"type="submit" name="submit" value="Add Location" />
    	<a class="btn btn-danger" href="device_search.php">Cancel</a>
    </form>
  </div>
</div>
<?php
	include ("footer.php")
?>