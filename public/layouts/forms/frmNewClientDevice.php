<?php
include ("layouts/tools/inserts/addClientDevice.php");


?>
<!-- This script changes Enter to Tab. The 'onkeypress="return tabE(this,event)"' Needs to be added to any input field-->
<script type="text/javascript" src="includes/js/enterToTab.js"> 
	
</script>
<script type="text/javascript">
		$(document).ready(function(){
		$('#c_id').change(function(){
			let c_id = $('#c_id').val()/*gets the value from the selected client and stores in the in the variable c_id*/
			$.ajax({
				url: './locationProcessor.php', /*calls the SQL data result location*/
				method: 'post',
				data: 'c_id=' + c_id
			}).done(function(locations){
				$('#location').empty();
						locations = JSON.parse(locations);
						locations.forEach(function(locations){
							$('#location').append("<option id=" + locations.id + " value=" + locations.id + ">" + locations.location + "</option>")
							
				})
			})
		})
	})
	function showMsg()
{

	$("#msgC").html($("#c_id option:selected").text());
	$("#location").html($("#location option:selected").text());
	return false;
}
</script>

  <div id="page">

    <form action="<?php $actionPage ;?>" method="post">
 		<label for="c_id">Client:</label>
		  	<select class="form-control" id="c_id" name="c_id">
		        	<option selected="" disabled="">Select Client</option>
		        	<?php
		        		 /*calling the file locationProcessor.php*/
		        		$clients = loadClients();/*Function from locationProcessor.php*/
		        		foreach ($clients as $clients){
		        			echo "<option id='".$clients['id']."' value='".$clients['id']."'>".$clients['client_name']."</option>";
		        		}
		        	?>
	        </select>
    	<label for="c_device_name">Client Device Name:</label>
    			<input class="form-control shadow-box" type="text" onkeypress="return tabE(this,event)" name="c_device_name" value="" />
    		<label for="c_device_sn">Serial Number:</label>
      		<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="c_device_sn" value="" />
    	<label for="c_device_type">Client Device Type:</label>
      		<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="c_device_type" value="" />
    	
      	<!-- 	<input class="form-control" type="text" name="c_id" value="" /> -->
      	<!--<?php/*if ($permission >= 2){*/?>--><label for="status">Status:</label>
 					<!--
 						DATABASE connection to pull all details from status
 					-->   
    		<?php $ops = client_device_status_select_loop();?>
    			
    		
    		<select name="status" class="form-control">
    			<!--
 					Dropdown menu for users to select a client name from the database connection found above
 				-->  
		     <?php echo $ops; ?>
			</select><!--<?php /*} else {*/?>--><input class="hidden" type='text' name='status' value=1 /><!--<?php/* };*/?>-->
		<label for="c_device_issue_to">Issued To:</label>
  			<input type="text" class='form-control' onkeypress='return tabE(this,event)' name='c_device_issue_to' value='' />
		<label for="location">Location</label>
			<select class="form-control" id="location" name="location">
				
			</select>
    	<input class="btn btn-primary"type="submit" name="submit" value="Add Device" />
    	<?php include("./layouts/tools/buttons/btnCancelButton.php"); ?>
    </form>
  </div>