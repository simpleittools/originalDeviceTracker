<?php include("header.php"); ?>
<?php confirm_logged_in(); ?>
<div class="container main col-lg-8">
	<form class="form-group main-form"> <!--Make enter = Tab-->
		<table>
			<tr>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			<tr>
				<div class="row">
					<td>
						<label for="depotNumber">In Depot #</label>
					</td>
					<td>
						<input type="text" id="depotNumber" name="depotNumber" class="form-control col-lg-4" placeholder="AutoNumber">
					</td>
				</div>
		
			</tr>
			<div class="row">
				<tr>
					<td>
						<label>Client Name:</label><!--This should pull from the Clients list-->
					</td>
					<td>
						<select class="form-control form-inline col-lg-4">
							<option>Client A</option>
							<option>Client B</option>
							<option>Client C</option>
						</select>
					</td>
					<td>
						<label>Check In:</label>
					</td>
					<td>
						<input type="date" class="form-control form-inline col-lg-4"> <!--Format should be MM/DD-->
					</td>
				</tr>
			</div>
			<div class="row">
				<label>Contact Name:</label>
				<input type="text" class="form-control col-lg-4">
			
				<label>Contact Phone #:</label>
				<input type="text" class="form-control col-lg-4">
			</div>
			<div class="row">
				<label>Device Name:</label>
				<input type="text" class="form-control col-lg-4">
				<label>Device Type:</label>
				<input type="text" class="form-control col-lg-4">
			</div>
			<div class="row">
				<label>Assigned To:</label><!--This should pull from the Users list-->
					<select class="form-control col-lg-4">
						<option>Technician A</option>
						<option>Technician B</option>
						<option>Technician C</option>
					</select>
				<label>Device S/N,ST:</label>
				<input type="text" class="form-control col-lg-4">
			</div>
			<div class="row">
				<label>Description:</label>
				<textarea class="form-control col-lg-8"></textarea>
			</div>
			<div class="row">
				<label>Notes:</label>
				<textarea class="form-control col-lg-8"></textarea>
			</div>
			<div class="row">
				<label>Status:</label>
					<select class="form-control col-lg-4">
						<option>Open</option>
						<option>Waiting for parts</option>
						<option>Contacted Client</option>
						<option>Closed</option>
					</select>
			</div>
		</table>
	</form>
</div>
<?php include("footer.php"); ?>