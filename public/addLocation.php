<?php
$page_name = "Add Location";

		
$actionPage = "addLocation.php";

include ("./layouts/framing.php");
if(isset($_GET['id'])){
			$client_id = $_GET['id'];
			$client_name_result = find_client_name_by_id($client_id);
			$full_page_name = $page_name . " for " . $client_name_result['client_name'];
		} else {
			$full_page_name = $page_name;
		};
/*Form Variables*/
$displayName = 'Location Name';
$cancelLocationValue = "backupDeviceSearch.php";
/*End Form Variables*/

/*SQL Inserts*/
include ("./layouts/tools/locationInsert.php")
/*End SQL Inserts*/

?>
<h1><?php echo $full_page_name;?></h1>

<div>
	<?php include ("./layouts/forms/frmNewLocationInput.php");?>
</div>




<?php include ("./layouts/bottom_framing.php");?>