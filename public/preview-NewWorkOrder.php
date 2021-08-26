<?php include("header.php"); ?>
<?php confirm_logged_in(); ?>

<link rel="stylesheet" href="includes/css/est-styles.css">
	<script>
			$("#newWoForm").submit(function(evt){
				evt.preventDefault();//This prevents the form from submitting the informaiton to early.
				
				var postData = $(this).serialize();
				
				var url = $(this).attr('action');
				//alert(postData);
				
				$.post(url, postData, function(php_table_data){
					$("#woResult").html(php_table_data);
					$("#newWoForm")[0].reset();

				});
					
				
				
			});
	</script>
		<div class="container">
			<div class="row">
				<div class="row">
					<div> <!--main section-->
						<div>
							<h1>New Work Order</h1>
							<form method="post" enctype="multipart/form-data" id="newWoForm" action="AddWO.php">
								<div class="form-group">
									<table class="table table-bordered table-condensed">
										<tr>
											<th><label form="WorkOrderStart"><span class="FieldInfo">Work Order#:</span></label></th><!--This will be imported from estimator-->
											<th><label form="WorkOrderStart"><span class="FieldInfo">Date:</span></label></th><!--This will be auto input-->
											<th><label form="WorkOrderStart"><span class="FieldInfo">Client PO#:</span></label></th><!--Manual entry. Will input to database for WorkOrderForm-->
									
										</tr>
										<tr>
											<td><input class="form-control" type="text" name="woNumb" id="woNumb" placeholder="Work Order # will be generated"></td>
											<td><input class="form-control" type="text" name="woDate" id="woDate" placeholder="Date will be generated"></td>
											<td><input class="form-control" type="text" name="clientPO" id="clientPO" placeholder="Client PO #"></td>
										</tr>
									</table>
									<table class="table table-bordered table-condensed">
										<tr>
											<th><label form="WorkOrderStart"><span class="FieldInfo">Client Name:</span></label></th>
											<th><label form="WorkOrderStart"><span class="FieldInfo">Requested By:</span></label></th>
										</tr>
										<tr>
											<td><input class="form-control" type="text" name="clientName" id="clientName" placeholder="Client Name"></td>
											<td><input class="form-control" type="text" name="clientRequestor" id="clientRequestor" placeholder="Requestor"></td>
										</tr>
										<tr>
											<th><label form="WorkOrderStart"><span class="FieldInfo">Project Name</span></label></th>
											<th><label form="WorkOrderStart"><span class="FieldInfo">Phase Name:</span></label></th>
										</tr>
										<tr>
											<td><input class="form-control" type="text" name="projectName" id="projectName" placeholder="Project Name"></td>
											<td><input class="form-control" type="text" name="projectPhase" id="projectPhase" placeholder="Project Phase"></td>
										</tr>
									</table>
									<table class="table table-bordered table-condensed">
										<tr>
											<th><label form="description"><span class="FieldInfo">1) Project Description:</span></label></th><!--custom css-->
										</tr>
										<tr>
											<td>
												<textarea class="form-control" name="projectDescription" id="projectDescription"></textarea>
											</td>
										</tr>
										
								
										<tr>
											<th><label form="scopeOfWork"><span class="FieldInfo">2) Scope of Work:</span></label><!--custom css--></th>
										</tr>
										<tr>
											<td><textarea class="form-control" name="ScopeOfWork" id="ScopeOfWork"></textarea><!--This will be replaced by the database input from the Estimator--></td>
										</tr>
									
										
									</table>
									<table class="table table-bordered table-condensed"> <!--This whole section will be filled in from Estimator-->
										<tr><th colspan="7"><label form="items"><span class="FieldInfo">3) Line Item Estimates and Totals:</span></label><!--custom css--></th></tr>
										<tr>
											<th style="width: 100px;">Item.</th>
											<th style="width: 100px;">Qty.</th>
											<th style="width: 50px;">Group</th>
											<th style="width: 750px;">Description</th>
											<th style="width: 100px;">Price per</th>
											<th style="width: 100px;">Price</th>
											<th>Add Row</th>
										</tr>
										<tr>
											<td><input class="form-control" type="number" name="itemCount" id="itemCount" placeholder="#"></td>
											<td><input class="form-control" type="number" name="itemQty" id="itemQty" placeholder="#"></td>
											<td><select>
												<option multiple class="form-control">HW</option>
												<option value="sw" multiple class='form-control'>SW</option>
												<option value="labor" multiple class='form-control'>Labor</option>
											</select></td>
											<td><textarea style = "height: 34px;" class="form-control" name="itemDescription" id="itemDescription" placeholder="Description of items. There are many items that can be in this column"></textarea></td>
											<td><input class="form-control" type="number" name="itemPrice" id="itemPrice" placeholder="$"></td>
											<td><input type="text" class="form-control" placeholder="QTY * Price Per"></td>
											<td width="5%"><input class="btn btn-success btn-sm" type="button" name="addRow" value="+"></td>
										</tr>
										<tr>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th>Total:</th>
											<th>=sum all of column6</th>
										</tr>
									</table>
								</div>
								<input class="btn btn-success btn-lg" type="Submit" name="createWorkOrder" value="Create Work Order">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6">
			<div id="woResult"></div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<?php include("footer.php"); ?>