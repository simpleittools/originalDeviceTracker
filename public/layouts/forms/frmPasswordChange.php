<?php 
	$displayName = 'Change Password';
?>

<?php
	include ("./layouts/tools/inserts/editPassword.php");
	
?>

<form class='form-group' action='changePassword.php?id=<?php echo urlencode($user_id); ?>' method='post'>
	<label for='password'><?php echo $displayName;?></label>
	<input type="password" class='form-control' name='password' required>

	<input class="btn btn-primary"type="submit" name="submit" value="Update Password" />
	<?php include("./layouts/tools/buttons/btnCancelButton.php"); ?>
</form>