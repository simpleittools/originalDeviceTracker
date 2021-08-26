<?php $device = find_device_by_client($client_id);?>

		<table class="table table-striped table-light table-hover edge">
			<thead>
				<tr>
					<th>Device Name</th>
					<th>Serial Number</th>
					<th>Device Type</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				   <?php foreach($device as $devices) { ?>
				   		<?php $status_id = $devices['c_id'];?>
						<?php $status_id = $devices['status']; ?>
						<?php $status_name = find_device_status($status_id);?>
						<tr>
							<td><?php echo $devices['device_name']; ?></td>
							<td><?php echo $status_id = $devices['serial_number'];?></td>
				   			<td><?php echo $status_id = $devices['device_type'];?></td>
							<td><?php echo $status_name['status']; ?></td>
						</tr>
				    <?php } ?>
			</tbody>
		</table>

	</div>
</div>