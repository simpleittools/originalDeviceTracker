    <?php $client_id = $device["c_id"];?>
	<?php $status_id = $device['status'];?>
	<?php $change_by_id = $device['change_by_id'];?>
 
    <form class="form-group" action="<?php $actionPage ;?>" method="post">
    	<label for="c_id">Client:</label>
    		<?php
    			include ('./layouts/tools/selectOption/clientSelected.php');
    		?>
    	<label for="device_name">Device:</label>
        	<input type="text" class="form-control" name="device_name" onkeypress="return tabE(this,event)" value="<?php echo htmlentities($device["device_name"]); ?>" />
    	<label for="serial_number">Serial Number:</label>
        	<input type="text" class="form-control" name="serial_number" onkeypress="return tabE(this,event)" value="<?php echo htmlentities($device["serial_number"]); ?>" />
	
		<label for="status">Status:</label>	
			<?php
				include ('./layouts/tools/selectOption/deviceStatus.php');
			?>

		
		<label for="change_by_id">Change By:</label>
			<?php
				include ('./layouts/tools/selectOption/changeById.php');	
			?>
				

		

		  
		<input class="btn btn-primary" type="submit" name="submit" value="Edit Device" />
		<?php include("./layouts/tools/buttons/btnCancelButton.php"); ?>
	</form>