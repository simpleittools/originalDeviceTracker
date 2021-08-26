<?php $full_client_result = find_all_clients(); ?>

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
							<td><a href="clientEdit.php?id=<?php echo urlencode($client['id'])?>"><?php echo $client['client_name'];?></a></td>
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