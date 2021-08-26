<?php
$page_name = "Device Override";
include ("./layouts/framing.php");
$device = find_device_by_id($_GET["id"]);
$actionPage =  'deviceEdit.php?id=' . urlencode($device['id']);
if(isset($_GET['id'])){
			$device_id = $_GET['id'];
			$device_name_result = find_device_by_id($_GET["id"]);
			$full_page_name = $page_name . " for " . $device_name_result['device_name'] . ': ' . $device_name_result['serial_number'];
		} else {
			$full_page_name = $page_name;
		};

/*
Contains the general outline for all pages
*/
include ('./layouts/tools/inserts/editDeviceInsert.php')
?>
<h1><?php echo $full_page_name;?></h1>
<div>
	<?php include ('./layouts/forms/frmDeviceEdit.php');?>
</div>
<?php include ("./layouts/bottom_framing.php");?>