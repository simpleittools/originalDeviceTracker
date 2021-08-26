<form class="form-group"action="<?php $actionPage ;?>" method="post">
	<label for="client_name">Client Name:</label>
		<input class="form-control" type="text" name="client_name" value="<?php echo htmlentities($client['client_name']); ?>" /><br class="input-form">
  	<label for="enabled">Status:</label>
  		<?php include ("./layouts/tools/selectOption/opClientStatus.php");?><br class="input-form">
  	<label for="locations">Locations:</label>
  		<?php
			$client = find_client_by_id($_GET['id']);
			$locations = find_location_by_client_id($client['id']);
		?>
		  	<?php if ($locations == !NULL) { ?>
			  	<table class="table table-bordered table-striped table-light table-hover edge">
			  		<thead>
			  			<th>Location Name</th>
			  			<th>Main Phone Number</th>
			  			<th>Address</th>
			  		</thead>
			  		<tbody>
			  			<?php
			  			foreach($locations as $client_locations) { ?>
							<tr>
								<td><a href="locationEdit.php?id=<?php echo urlencode($client_locations['id'])?>"><?php echo $client_locations['location'];?></a></td> <!--Need to set as link to edit location-->
								<td><?php echo $client_locations['main_phone'];?></td>
								<td><?php echo $client_locations['street_address'] . ", " .$client_locations['street_address_alt'] . " " . $client_locations['city'] . ", " . $client_locations['state'] . " " .$client_locations['zip'];?></td>
							</tr>
						    <?php }; ?>
			  		</tbody>
			  	</table>
			  	<input class="btn btn-primary"type="submit" name="submit" value="Update Client" />
				<a class ="btn btn-secondary" href="addLocation.php?id=<?php echo htmlentities($client['id']);?>">Add Location</a>
				<?php include("./layouts/tools/buttons/btnCancelButton.php"); ?>
		  	<?php } else { ?>
		  		<p class = "noLocation display-4">No Locations Set</p>
				<input class="btn btn-primary"type="submit" name="submit" value="Update Client" />
		  		<a class ="btn btn-secondary" href="addLocation.php?id=<?php echo htmlentities($client['id']);?>">Add Location</a>
   				<?php include("./layouts/tools/buttons/btnCancelButton.php"); ?>
		  	<?php }; ?>
  	<br>

</form>