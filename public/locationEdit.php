<?php
$page_name = "Edit Location";
include ("./layouts/framing.php");
$location = find_location_by_id($_GET["id"]);
$actionPage =  "locationEdit.php?id=" . urlencode($location['id']);
if(isset($_GET['id'])){
			$client_name_result = find_client_by_id($location['c_id']);
			$full_page_name = $page_name . " for " . $client_name_result['client_name'] . " - " . $location['location'];
		} else {
			$full_page_name = $page_name;
		};

include ('./layouts/tools/processors/locationProcessors/locationUpdate.php');
/*
Contains the general outline for all pages
*/
?>
<h1><?php echo $full_page_name;?></h1>

<div>
	<?php include ("./layouts/forms/frmLocationUpdate.php");?>
</div>

<?php include ("./layouts/bottom_framing.php");?>