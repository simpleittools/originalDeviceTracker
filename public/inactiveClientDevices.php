<?php
$page_name = "Inactive Client Devices";

include ("./layouts/framing.php");
if(isset($_GET['id'])){
			$client_id = $_GET['id'];
			$client_name_result = find_client_by_id($client_id);
			$full_page_name = $page_name . " for " . $client_name_result['client_name'];
		} else {
			$full_page_name = $page_name;
		};

/*
Contains the general outline for all pages
*/
?>
<h1><?php echo $full_page_name;?></h1>

<div>
	<?php include ('./layouts/tables/inactiveDevicesByClient.php'); ?>
</div>


<?php include ("./layouts/bottom_framing.php");?>