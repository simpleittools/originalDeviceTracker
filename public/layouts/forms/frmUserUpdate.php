<form class="form-group" action="profileEdit.php?id=<?php echo urlencode($user["id"]); ?>" method="post">
	<label for="username">Username:</label>
		<input class="form-control" type="text" name="username" value="<?php echo htmlentities($user['username']); ?>" /><br class="input-form">
	<label for="password">Password:</label>
		<a class='btn btn-primary btn-sm' href="changePassword.php?id=<?php echo urlencode($user['id']);?>" role='button' disabled>Change Password</a><br>
	<label for="FirstName">First Name:</label>
		<input class="form-control" type="text" name="FirstName" value="<?php echo htmlentities($user['FirstName']); ?>" /><br class="input-form">
	<label for="LastName">Last Name:</label>
		<input class="form-control" type="text" name="LastName" value="<?php echo htmlentities($user['LastName']); ?>" /><br class="input-form">
	<label for="email">Email Address:</label>
		<input class="form-control"type="email" name='email' value="<?php echo htmlentities($user['email']); ?>" /><br class="input-form">
	<label for="desk_phone">Desk Phone:</label>
		<input class="form-control"type="tel" name='desk_phone' value="<?php echo htmlentities($user['desk_phone']); ?>" /><br class="input-form">
	<label for="cell_phone">Cell Phone:</label>
  		<input class="form-control"type="tel" name='cell_phone' value="<?php echo htmlentities($user['cell_phone']); ?>" /><br class="input-form">
  	<?php if ($permission == 3 or $permission == 4){?>
  	<label for="Permission">Permission:</label>
  		<?php include ("./layouts/tools/selectOption/opPermission.php");?>
  	<?php } else { 
  		$endUserPermission = $userPermission;
  		};?>
  	<br>
  	<?php if ($permission == 3 or $permission == 4){?>
  	<label for="start_page">Start Page:</label>
  		<?php include ("./layouts/tools/selectOption/opStartPage.php");?>
  	<?php } else { 
  		$startPageOption = $startPage;
  		};?>
  	<input class="btn btn-primary"type="submit" name="submit" value="Update User" />
	<?php include("./layouts/tools/buttons/btnCancelButton.php"); ?>
</form>