<?php include("header.php");?>
<?php confirm_logged_in(); ?>

<?php
	$bug_set = bug_report();
	
?>
<div class="container container-fluid edge">
	<div>
		<table class="table table-striped table-dark table-hover">
			<thead>
				<tr>
					<th>Report ID</th>
					<th>Reported By</th>
					<th>Description</th>
					<th>Result</th>
					<th>Date of Report</th>
					
				</tr>
			</thead>
			<tbody>
					<?php while($bug = mysqli_fetch_assoc($bug_set)) {
					
					$ticket_number = $bug["id"];
					$description = $bug["description"];
					$result = $bug["result"];
					$date = $bug['date'];
					?>
				      <tr>
				      	<td><?php echo htmlentities($ticket_number); ?></td>
				        <td><?php
				        		$reported_by_id = $bug["reported_by_id"];
								global $con;
								$user_query = "SELECT FirstName FROM users WHERE id = $reported_by_id";
								$user_execute = mysqli_query($con, $user_query); 
								$user_result = mysqli_fetch_array($user_execute);
								echo $user_result["FirstName"];
							?></td>
				        <td><?php echo htmlentities($description); ?></td>
				        <td><?php echo htmlentities($result); ?></td>
				        <td><?php echo htmlentities($date);?></td>
				        <!--<td> <a href="device_edit.php?id=<?php echo urlencode($device["id"]); ?>">Edit</a></td>-->
				      </tr>
				    <?php } ?>
				    
				    
			</tbody>
		</table>
		
		<a class="btn btn-submit" href="device_search.php">Device Search</a>
	</div>
</div>

<?php
	include ("footer.php")
?>