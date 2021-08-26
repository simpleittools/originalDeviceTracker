<?php $active_client_result = find_active_clients(); ?>

		<table class="table table-bordered table-striped table-light table-hover edge">
			<thead>
				<tr>
					<th>Client Name</th>
					<th>Status</th>
		
					
				</tr>
			</thead>
			<tbody>
				   <?php foreach($active_client_result as $client) { ?>
						<tr>
							<td>
								<?php if ($page_name == "Clients") { ?>
									<a href="clientDetails.php?id=<?php echo urlencode($client['id'])?>"><?php echo $client['client_name'];?></a></td>
								<?php } else { ?>
									<a href="clientEdit.php?id=<?php echo urlencode($client['id'])?>"><?php echo $client['client_name'];?></a>
									<?php }; ?></td>
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