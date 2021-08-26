<form action="<?php $actionPage ;?>" method="post">
	<label for="username">Username:</label>
		<input class="form-control" type="text" name="username" value="" /><br class="input-form">
	<label for="password">Password:</label>
		<input class="form-control" type="password" name="password" value="" /><br class="input-form">
	<label for="FirstName">First Name:</label>
		<input class="form-control" type="text" name="FirstName" value="" /><br class="input-form">
	<label for="LastName">Last Name:</label>
		<input class="form-control" type="text" name="LastName" value="" /><br class="input-form">
	<label for="email">Email Address:</label>
		<input class="form-control" type="email" name='email' value="" /><br class="input-form">
	<label for="desk_phone">Desk Phone:</label>
		<input class="form-control" type="tel" name='desk_phone' value="" /><br class="input-form">
	<label for="cell_phone">Cell Phone:</label>
  		<input class="form-control" type="tel" name='cell_phone' value="" /><br class="input-form">
	<label for="Permission">Permission:</label>
		<?php 
			$ops = permission_select_loop();
		?>
		<select name="Permission" class="form-control">
 			<?php echo $ops;
 				$p_level = $ops;
 			?>
		</select>
		<br>
	<label for="start_page">User Start Page:</label>
		<?php 
			$startPageSelectOptions = page_select_loop();
		?>
		<select name="start_page" class="form-control">
 			<?php echo $startPageSelectOptions;
 				$startPageOption = $startPageSelectOptions;
 			?>
		</select>
  <input class="btn btn-primary"type="submit" name="submit" value="Create User" />
   <?php include("./layouts/tools/buttons/btnCancelButton.php"); ?>
</form>