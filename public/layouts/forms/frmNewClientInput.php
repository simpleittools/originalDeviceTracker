<form action="<?php $actionPage ;?>" method="post">
	<label for='client_name'><?php echo $displayName;?></label>
	<input type="text" class='form-control' name='client_name' onkeypress="return tabE(this,event)"placeholder="<?php echo $displayName?>" required>
	<input class="btn btn-primary" type="submit" id='submit' name="submit" value="<?php echo $submitButtonValue;?>" />
	<?php include ("./layouts/tools/buttons/btnCancelButton.php");?>
</form>