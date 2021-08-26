<?php
$page_name = "Backup Device Override";
include ("./layouts/framing.php");
$actionPage = "deviceList.php";
?>

<!--
	THIS CHECKS USER PERMISSIONS
-->
<?php
	if($permission != 3 and $permission != 4){
		redirect_to("deny.php");
	};
?>
<?php
if(isset($_GET['id'])){
			$client_id = $_GET['id'];
			$client_name_result = find_client_name_by_id($client_id);
			$full_page_name = $page_name . " for " . $client_name_result['client_name'];
		} else {
			$full_page_name = $page_name;
		};
?>
<h1><?php echo $full_page_name;?></h1>
<div>
	<?php include ("./layouts/tools/searchBar.php");?>
</div>

<div>
	<?php include ("./layouts/tables/deviceListView.php");?>
</div>

<?php include ("./layouts/bottom_framing.php");?>