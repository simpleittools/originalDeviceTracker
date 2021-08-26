<?php $page_title = "Device Search";?>
<?php include("header.php");?>
<?php confirm_logged_in(); ?>
<!-- <?php session_time_out(); ?> -->

			<center><form action="device_search.php" method="POST">
				<fieldset>
					<input class="form-control" type="text" id="Search" Name="Search" value="" placeholder="Serial Number, Device Name, or Device Type" autofocus>
					<input class="btn btn-primary" type="Submit" id="SearchButton" Name="SearchButton" value="Search">
				</fieldset>
			</form></center>
		</div>
		<br>
		<div class="container main-form col-lg-7">
<?php
	$con;
	if(isset($_POST['SearchButton'])){
		$search=$_POST['Search'];
		$execute = device_search($search);
		while($rows = mysqli_fetch_array($execute)){
			$id=$rows['id'];
			$client_id=$rows['c_id'];
			$device=$rows['device_name'];
			$sn=$rows['serial_number'];
			$status=$rows['status'];
			$device_type=$rows['device_type'];
			//$server_id=$rows['server_id'];
			$user_id=$rows['change_by_id'];
			$date_change=$rows['date_change'];

?>
		
			
			<table class="table table-striped table-light table-hover">
				<!-- <caption>Search Results</caption> -->
				<tr>
					<th>ID</th>
					<th>Client Name</th>
					<th>Device Name</th>
					<th>Serial Number</th>
					<!-- <th>Comment</th> -->
					<th>Status</th>
					<th>Device Type</th>
				<!--	<th>Server</th>-->
					<th>Edit By</th>
					<th>Check In/Out</th>
					<th>Last Change Date</th>
				</tr>
<tr>
			<!--
				**************************************
				Results from the table
				**************************************
			-->
				<td><?php echo $id; ?></td>
				<!--
					******************************************************************************************
					takes the ClientID from the devices table and translates to client_name from clients table
					All of these should probably be functions
					******************************************************************************************
				-->
				<td><?php
						$result = find_client_by_id($client_id);
						echo $result["client_name"]; 
					?></td>
				<td><?php echo $device; ?></td>
				<td><?php echo $sn; ?></td>
				<td><?php if($status == "1"){
						echo "In-depot";
					}elseif ($status =="2"){
						echo "Out to client";
					}elseif ($status == "3"){
						echo "Frozen";
					}elseif ($status == "4"){
						echo "Frozen/Out";
					}elseif ($status == "5"){
						echo "Retired";
					};?></td>
				<td><?php echo $device_type; ?></td>
				
				
				
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
						$user= find_user_by_id($user_id);
						echo $user["FirstName"];
					?>
				</td>
				<td> <!-- This will check if device current status and display buttons to change status -->
					<?php
						if($status == "1"){
							?>	<input class="btn btn-primary" type=button name="CheckOut" onclick="location.href='checkout.php?id=<?php echo $id;?>';" value="Check Out"> <?php
						}elseif($status == "2"){
							?>	<input class="btn btn-success" type=button name="CheckIn" onclick="location.href='checkin.php?id=<?php echo $id;?>';" value="Check In"> <?php
						}elseif($status == "3"){
							?> <input class="btn btn-warning" type=button name="Frozen" onclick="location.href='frozen_out.php?id=<?php echo $id;?>';" value="Frozen-Out"> <?php
						}elseif($status == "4"){
							?> <input class="btn btn-danger" type=button name="FrozenOut" onclick="location.href='frozen.php?id=<?php echo $id;?>';" value="Frozen-In"> <?php
						}elseif($status == "5"){
							echo "Retired";
						};
					?>
				</td>
				<td><?php echo $date_change; ?></td>
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