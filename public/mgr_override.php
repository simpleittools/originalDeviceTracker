<?php $page_title = "Manager Override";?>
<?php include("header.php"); ?>
<?php confirm_logged_in(); ?>
<?php
	if($permission != 3 && $permission !=4){
		redirect_to("deny.php");
	};
?>



<div class="container main" id="center">
			<center><form action="mgr_override.php" method="POST">
				<fieldset>
					<input class="form-control" type="text" id="Search" Name="Search" value="" placeholder="Serial Number or Device Name" autofocus>
					<input class="btn btn-success" type="Submit" id="SearchButton" Name="SearchButton" value="Search">
				</fieldset>
			</form></center>
		</div>
<?php
	$con;
	if(isset($_POST['SearchButton'])){
		$search=$_POST['Search'];
		$search_query="SELECT * FROM devices
			WHERE serial_number LIKE '%$search%' OR device_name LIKE '%$search%'";
		$execute=mysqli_query($con,$search_query);
		while($rows = mysqli_fetch_array($execute)){
			$d_id=$rows['id'];
			$client_id=$rows['c_id'];
			$device=$rows['device_name'];
			$sn=$rows['serial_number'];
			$status=$rows['status'];
			//$dev_type=$rows['dev_type_id'];
			//$server_id=$rows['server_id'];
			$change_by_id=$rows['change_by_id'];
			$date_change=$rows['date_change'];

?>
			<div class="container">
			<table class="table table-striped table-dark table-hover">
				<!-- <caption>Search Results</caption> -->
				<tr>
					<th>ID</th>
					<th>Client Name</th>
					<th>Device Name</th>
					<th>Serial Number</th>
					<!-- <th>Comment</th> -->
					<th>Status</th>
				<!--	<th>Device Type</th> -->
				<!--	<th>Server</th>-->
					<th>Change By</th>

					<th>Submit</th>
				</tr>
<tr>
			<!--
				**************************************
				Results from the table
				**************************************
			-->
				<td><?php echo $d_id; ?></td>
				<!--
					******************************************************************************************
					takes the ClientID from the devices table and translates to client_name from clients table
					All of these should probably be functions
					******************************************************************************************
				-->
				<td><?php
						global $con;
						$client_query = "SELECT client_name FROM clients WHERE id = $client_id";
						$client_execute = mysqli_query($con, $client_query); 
						$result = mysqli_fetch_array($client_execute);
						echo $result["client_name"]; 
					?></td>
				<td><?php echo $device; ?></td>
				<td><?php echo $sn; ?></td>
				<td><?php if($status == "1"){
						echo "In";
					}elseif ($status =="2"){
						echo "Out";
					}elseif ($status == "3"){
						echo "Frozen";
					}elseif ($status == "4"){
						echo "Frozen/Out";
					}elseif ($status == "5"){
						echo "Retired";
					};?></td>
				
				
				
			<!-- 	<td> 
					
						******************************************************************************************
						This is checking the servers table to determine which server is associated with the device
						All of these should probably be functions
						******************************************************************************************
					-->
					<?php
						/**********************************************************************************************************
							Remvoing this section for now, I will add back in when I can make some more dynamic adjustments with JS
						***********************************************************************************************************
						$con;
						$server_query = "SELECT server_name FROM servers WHERE id = $server_id";
						$server_execute = mysqli_query($con, $server_query); 
						$server_result = mysqli_fetch_array($server_execute);
						echo $server_result["server_name"];
						**********************************************************************************************************/
					?>
				</td>
				<td>
					<!-- 
						*********************************************************************
						This is checking the users table for which user made the last change
						All of these should probably be functions
						******************************************************************************************
					-->
					<?php
						
						global $con;
						$user_query = "SELECT FirstName FROM users WHERE id = $change_by_id";
						$user_execute = mysqli_query($con, $user_query); 
						$user_result = mysqli_fetch_array($user_execute);
						echo $user_result["FirstName"];
					?>
				</td>

				<td>
					<!--This is supposed to collect the $s_option->id and pass it to mgr_override_btn.php so that it can update the database-->
					
					<a class="btn btn-primary" href="device_edit.php?id=<?php echo urlencode($d_id); ?>">Override</a>
				</td>
				<!-- <td><?php// echo $date_change; ?></td> -->
			</tr>
			<?php
				}; //closes the initial database search loop
			?>
			</table>
			</div>
<?php
		}
	
?>

<?php include("footer.php"); ?>