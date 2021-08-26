<?php $page_title = "PREVIEW Project Status Board"; ?>
<link rel="stylesheet" href="includes/css/projectboard-styles.css">
<?php include("header2.php"); ?>
<?php confirm_logged_in(); ?>

  	<div>
  		
		
  	</div>

	<div class="psbContainer main-form">
		<div>
			<table class="table table-striped table-bordered table-hover table-light" id="projectTable">
				<div class="sticky">
				<thead>
					
					<tr>
						<th colspan="11" class="table-header"><input type="button" class="btn btn-primary inline-block" onclick="insert_Row()" id="addRow" value="Add Row" data-toggle="tooltip" data-placement="top" title="This works now, but doesn't save anywhere">
						<input type="button" class="btn btn-primary inline-block" onclick="#" id="save" value="Save"></th>
					</tr>
				
					<tr>
						<th scope="col">#</th>
						<th scope="col">Client</th>
						<th scope="col">Project</th>
						<th scope="col">Job</th>
						<th scope="col">Latest Status</th>
						<th scope="col">Project Lead</th>
						<th scope="col">Assigned To</th>
						<th scope="col">Edit Date</th>
						<th scope="col">Create Date</th>
						<th scope="col">Status</th>
						<th class="rowDel"></th>
					</tr>
				</thead>
				
				</div>	
				<tbody>
					<tr>
						<!--automatically incremented/decremented count-->
						<th scope="row" class="dataRow">#</th>
						<!--manual entry or pulled from db. if it does not exist in the db, add with this entry-->
						<td scope="row"><input type="text" placeholder="client name" name="clientName" data-toggle="tooltip" data-placement="top" title="Will Query DB for client, but allow new creation."></td>
						<!--manual entry or pulled from db. if it does not exist in the db, add with this entry-->
						<td scope="row"><input type="text" placeholder="project name" name="projectName" data-toggle="tooltip" data-placement="top" title="Will Query DB for project, but allow new creation."></td>
						<!--manual entry or pulled from db. if it does not exist in the db, add with this entry-->
						<td scope="row"><input type="text" placeholder="job name" name="jobName" data-toggle="tooltip" data-placement="top" title="Will Query DB for job, but allow new creation."></td>
						<!--manual entry, with an expanding textarea. This will be set for a refresh of 1/2 second-->
						<td scope="row"><textarea name="description" data-toggle="tooltip" data-placement="top" title="Auto-expanding form, this is working now. Will update user view every 1 second for shared viewing"></textarea></td>
						<!--Dropdown. selection will be available from database-->
						<td scope="row"><select name="projectLead" data-toggle="tooltip" data-placement="top" title="Will Query DB for SR Engineers or Managers.">
							<option>JD</option>
							<option>Jim</option>
							<option>James</option>
						</select></td>					
						<!--Dropdown. Selection will be available from database-->
						<td scope="row"><select name="assingedEng" data-toggle="tooltip" data-placement="top" title="Will Query DB for users.">
							<option>Cortez</option>
							<option>Deonisy</option>
							<option>JD</option>
							<option>Jim</option>
							<option>Nicholas</option>
							<option>Nick</option>
							<option>Ryan</option>
							<option>Sterling</option>
							<option>Terance</option>
							<option>Vicki</option>
						</select></td>
						<!--If edited, change date-->
						<td scope="row"><input type="date" name="dateEdited" data-toggle="tooltip" data-placement="top" title="Will auto change based on editing date, but allow override."></td>
						<!--Date Created pulled from DB. Autoset with the add button-->
						<td scope="row"><input type="date" name="dateCreated" data-toggle="tooltip" data-placement="top" title="Will auto change based on created date, but allow override."></td>
						<!--Dropdown, if closed a delete button shows up next to the option-->
						<td scope="row" ><select name="status" id="status" onchange="selectStatus()" data-toggle="tooltip" data-placement="top" title="Will save status to DB. If you choose Close, you can delete a row. Try this now. Only works on top row at this time.">
							<option value="1">Active</option>
							<option value="2">Sales</option>
							<option value="3">Stalled</option>
							<option value="4">Closed</option>
						</select></td>
						<!--+++++++++++++++++++++++++++++++++++++++++++
							This loads properly but is only working 
							on the first line. Need to get the JS to
							see the lines that are added.
						++++++++++++++++++++++++++++++++++++++++++++-->
						<td><input type="button" value="-" onclick="removeRow(this)" class="btn del" id="del"></td>
				</tbody>
			</table>
		</div>
	</div>
	<script src='includes/js/projectboard-script.js'></script>