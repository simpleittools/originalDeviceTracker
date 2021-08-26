<tr>
	<!--
	**************************************
	Results from the table
	**************************************
	-->
	<!--<td><?php echo $id; ?></td>-->
	<!--
		******************************************************************************************
		takes the ClientID from the devices table and translates to client_name from clients table
		
		******************************************************************************************
	-->
	<td><?php $client_name_result = find_client_name_by_id($client_id);?>
	<!-- <a href="client_details.php?client_id=<?php echo $client_id;?>"> -->
		<?php echo $client_name_result["client_name"]; ?></a>
	</td>
	<td><?php echo $device; ?></td>
	<td><?php echo $sn; ?></td>
	<td><?php 
	if($status == "1"){
			echo "In";
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
			$result= find_user_name_by_id($user_id);
			echo $result["FirstName"];
		?>
	</td>
<!-- TR Ends on Date Page -->