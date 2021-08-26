<?php $page_title = "User List"; ?>
<?php
	include("header.php");
?>
<?php confirm_logged_in(); ?>

<?php
	$user_set = find_all_users();
?>

	<div class="container container-fluid">
		<div>
			<table class="table table-striped table-light table-hover edge">
				<thead>
					<tr>
						<th>Username</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Permission Level</th>
						<?php if ($permission > 2){?><th>Edit</th><?php };?>
						
					</tr>
				</thead>
				<tbody>
					   <?php while($user = mysqli_fetch_assoc($user_set)) { ?>
					      <tr>
					        <td><?php echo htmlentities($user["username"]); ?></td>
					        <td><?php echo htmlentities($user["FirstName"]); ?></td>
					        <td><?php echo htmlentities($user["LastName"]); ?></td>
					        <td><?php echo htmlentities($user["Permission"]); ?></td>
					        <?php if ($permission > 2){?><td><a href="user_edit.php?id=<?php echo urlencode($user["id"]); ?>">Edit</a></td><?php };?>
					        
					      </tr>
					    <?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
	include ("footer.php")
?>