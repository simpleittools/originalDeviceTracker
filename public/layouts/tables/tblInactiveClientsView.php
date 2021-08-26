<?php $full_client_result = find_inactive_clients(); ?>

		<table class="table table-striped table-light table-hover edge">
			<thead>
				<tr>
					<th>Client Name</th>
					<th>Status</th>
					
				</tr>
			</thead>
			<tbody>
				   <?php foreach($full_client_result as $client) { ?>
						<tr>
							<?php if ($page_name == "Inactive Clients") { ?>
								<td><a href="clientEdit.php?id=<?php echo urlencode($client['id'])?>"><?php echo $client['client_name'];?></a></td>
							<?php } else { ?>
								<td><a href="inactiveClientDevices.php?id=<?php echo urlencode($client['id'])?>"><?php echo $client['client_name'];?></a></td>
							<?php }; ?>
							<td><?php if ($client['enabled'] == 1) {
								echo "Active";
							} else {
								echo "Inactive";
							};?></td>
						</tr>
				    <?php } ?>
			</tbody>
		</table>

	</div>
</div>