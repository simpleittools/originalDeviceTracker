<?php $page_title = "Device Report";?>
<?php
	include("header.php");
?>
<?php confirm_logged_in(); ?>
<?php
	$device_set = device_report();
	
?>

	<div class="container container-fluid edge">
		<div>
			<table class="table table-striped table-light table-hover">
				<thead>
					<tr>
						<th>Client</th>
						<th>Device Name</th>
						<th>Serial Number</th>
						<th>Device Type</th>
						<th>Status</th>
						<th>Last User</th>
						<th>Change Date</th>
						
					</tr>
				</thead>
				<tbody>
						<?php while($device = mysqli_fetch_assoc($device_set)) {
							$client_id = find_client_by_id($device["c_id"]);
							$client_name = $client_id["client_name"];
							$dstatus = $device['status'];
						?>
					      <tr>
					      	<td><?php echo htmlentities($client_name); ?></td>
					        <td><?php echo htmlentities($device["device_name"]); ?></td>
					        <td><?php echo htmlentities($device["serial_number"]); ?></td>
					        <td><?php echo htmlentities($device["device_type"]); ?></td>
					        <td>
					        <?php if($dstatus == "1"){
								echo "In";
								}elseif ($dstatus =="2"){
									echo "Out";
								}elseif ($dstatus == "3"){
									echo "Frozen";
								}elseif ($dstatus == "4"){
									echo "Frozen/Out";
								}elseif ($dstatus == "5"){
									echo "Retired";
								};?></td>
					        <td>
					        	<?php
					        		change_by_id($device);
								?>
							</td>
					        <td><?php echo htmlentities($device["date_change"]); ?></td>
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