<form action="<?php $actionPage ;?>" method="post">
	<?php if(isset($_GET['id'])){
		$c_id = $_GET['id'];
	} else {
		?> <label for="c_id">Client:</label><?php 
		$ops = client_select_loop();
		?>
		<select name="c_id" class="form-control">
    			
 		<?php echo $ops;
 			$c_id = $ops;?>
			</select>
	<?php };?>
	<label for="location"><?php echo $displayName;?></label>
	<input type="text" class='form-control' name='location' onkeypress="return tabE(this,event)"placeholder="<?php echo $displayName?>" required>
	<label for="street_address">Street Address:</label>
	<input type="text" class='form-control' name="street_address" onkeypress="return tabE(this,event)"placeholder="e.g. 123 Main Street"required>
	<label for="street_address_alt">Address 2:</label>
	<input type="text" class='form-control' name="street_address_alt" onkeypress="return tabE(this,event)"placeholder="Suite 111">
	<label for="city">City</label>
	<input type="text" name="city" onkeypress="return tabE(this,event)" class="form-control" required>
	<label for="state">State</label>
	<?php include ("./layouts/tools/selectOption/stateSelectOption.php");?>
	<label for="zip">Zip Code</label>
	<input type="text" name="zip" onkeypress="return tabE(this,event)" class="form-control" required>
	<label for="main_phone">Main Phone:</label><span class='note'>&nbsp;&nbsp;&nbsp;&nbsp;Format: xxx-xxx-xxxx</span>
	<input type="tel" class='form-control' pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="main_phone" onkeypress="return tabE(this,event)">
	<input class="btn btn-primary" type="submit" id='submit' name="submit" value="submit" />
	<?php include ("./layouts/tools/buttons/btnCancelButton.php");?>
</form>
<script src="./includes/js/enterToTab.js"></script>