<?php
include ("layouts/tools/backupDeviceInsert.php");

?>
<!-- This script changes Enter to Tab. The 'onkeypress="return tabE(this,event)"' Needs to be added to any input field-->
<script type="text/javascript" src="includes/js/enterToTab.js"> 
	
</script>


  <div id="page">

    <form action="<?php $actionPage ;?>" method="post">
    	<?php if(isset($_GET['id'])){
		$c_id = $_GET['id'];
	} else {
		?> <label for="c_id">Client:</label> <?php
		$ops = client_select_loop();?>
		
		<select name="c_id" class="form-control">
    	<?php		
 		echo $ops;
 			$c_id = $ops;?>
			</select>
	<?php }; ?>
  
    	<label for="device_name">Device Name:</label>
    			<input class="form-control shadow-box" type="text" onkeypress="return tabE(this,event)" name="device_name" value="" />
    		<label for="serial_number">Serial Number:</label>
      		<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="serial_number" value="" />
    	<label for="device_type">Device Type:</label>
      		<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="device_type" value="" />
    	
      	<!-- 	<input class="form-control" type="text" name="c_id" value="" /> -->
      	<!--<?php/*if ($permission >= 2){*/?>--><label for="status">Status:</label>
 					<!--
 						DATABASE connection to pull all details from status
 					-->   
    		<?php $ops = status_select_loop();?>
    			
    		
    		<select name="status" class="form-control">
    			<!--
 					Dropdown menu for users to select a client name from the database connection found above
 				-->  
		     <?php echo $ops; ?>
			</select><!--<?php /*} else {*/?>--><input class="hidden" type='text' name='status' value=1 /><!--<?php/* };*/?>-->
    	<input class="btn btn-primary"type="submit" name="submit" value="Add Device" />
    	<?php include("./layouts/tools/buttons/btnCancelButton.php"); ?>
    	<!-- <input class="btn btn-danger" action="action" onclick="window.history.go(-1); return false;" type="button" value="cancel"> -->
    </form>
  </div>