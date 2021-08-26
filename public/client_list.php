<?php $page_title = "Client List";?>
<?php include("header.php");?>
<?php confirm_logged_in(); ?>

<?php
	$client_set = find_all_clients();
?>

	
		<table class="table table-striped table-light table-hover">
			<thead>
				<tr>
					<th>Client Name</th>
					<th></th>
					<th></th>
					<th>Edit</th>
					
				</tr>
			</thead>
			<tbody>
				   <?php while($client = mysqli_fetch_assoc($client_set)) { ?>
				      <tr>
				        <td><?php echo htmlentities($client["client_name"]); ?></td>
				        <td><a class="btn btn-sm btn-primary" href="client_details.php?id=<?php echo urlencode($client["id"]); ?>">Details</a></td>
				        <td><a class="btn btn-sm btn-primary" href="new_sub.php?id=<?php echo urlencode($client["id"]); ?>">Add Sub-Unit</a></td>
				        <td><a class="btn btn-sm btn-outline-primary" href="client_edit.php?id=<?php echo urlencode($client["id"]); ?>">Edit</a></td>
				      </tr>
				    <?php } ?>
			</tbody>
		</table>
	</div>
</div>

<?php
	include ("footer.php")
?>