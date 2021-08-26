	<?php
	$con;
	if(isset($_POST['SearchButton'])){
		$search=$_POST['Search'];
		$result = device_search($search);
		foreach($result as $rows) {
			$id=$rows['id'];
			$client_id=$rows['c_id'];
			$device=$rows['device_name'];
			$sn=$rows['serial_number'];
			$status=$rows['status'];
			$device_type=$rows['device_type'];
			//$server_id=$rows['server_id'];
			$user_id=$rows['change_by_id'];
			$date_change=$rows['date_change'];
			$enabled = $rows['enabled'];

?>
		
			
			<table class="table table-striped table-light table-hover">
				<?php include ("./layouts/tables/tableParts/backupDeviceListHeaders.php");?>
				<?php include ("./layouts/tables/tableParts/backupDeviceListData.php");?>
				<td> <!-- This will check if device current status and display buttons to change status -->
					<?php
					if($enabled == "1"){
						if($status == "1"){
							include ("./layouts/tables/tableParts/btnCheckOut.php");
						}elseif($status == "2"){
							include ("./layouts/tables/tableParts/btnCheckIn.php");	
						}elseif($status == "3"){
							include ("./layouts/tables/tableParts/btnFrozenOut.php");	
						}elseif($status == "4"){
							include ("./layouts/tables/tableParts/btnFrozenIn.php");
						}elseif($status == "5"){
							echo "Retired";
						};
					} else {
						echo "Disabled";
					}
					?>
					
				</td>
				<?php include ("./layouts/tables/tableParts/colDateChange.php");?>
			<?php
				}; //closes the initial database search loop
			?>
			</table>
			
<?php
		}
	
?>