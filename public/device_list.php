<?php $page_title = "Device List";?>
<?php
	include("header.php");
?>
<?php confirm_logged_in(); ?>
<?php
	$device_set = find_all_devices();
	
?>

	<div>
		<table class="table table-striped table-light table-hover">
			<thead>
				<tr>
					<th>Client</th>
					<th>Device Name</th>
					<th>Serial Number</th>
					<th>Device Type</th>
					<th>Edit</th>
					<?php
						$user_id = $_SESSION['user_id'];
							global $con;
							$query  = "SELECT Permission ";
							$query .= "FROM users ";
							$query .= "WHERE id = {$user_id} ";
							$query .= "LIMIT 1";
							$permission_set = mysqli_query($con, $query);
							while($rows = mysqli_fetch_array($permission_set)){
								$permission=$rows['Permission'];
							if($permission >2){
					?>
					<th>Manager Override</th>
					<?php };}; ?>
					
				</tr>
			</thead>
			<tbody>
					<?php while($device = mysqli_fetch_assoc($device_set)) { 
					$client_id = find_client_by_id($device["c_id"]);
					$client_name = $client_id["client_name"];
					?>
				      <tr>
				      	<td><?php echo htmlentities($client_name); ?></td>
				        <td><?php echo htmlentities($device["device_name"]); ?></td>
				        <td><?php echo htmlentities($device["serial_number"]); ?></td>
				        <td><?php echo htmlentities($device["device_type"]); ?></td>
				        <td><a href="device_edit.php?id=<?php echo urlencode($device["id"]); ?>">Edit</a></td>
				        <td><?php if($permission > 2){?><a href="device_edit.php?id=<?php echo urlencode($device["id"]); ?>">Manager Override</a><?php };?></td>
				      </tr>
				    <?php } ?>
			</tbody>
		</table>
	</div>
</div>

<?php
	include ("footer.php")
?>