<?php
$page_name = "Backup Device Search";
$actionPage = "backupDeviceSearch.php";
include ("./layouts/framing.php");
if(isset($_GET['id'])){
			$client_id = $_GET['id'];
			$client_name_result = find_client_name_by_id($client_id);
			$full_page_name = $page_name . " for " . $client_name_result['client_name'];
		} else {
			$full_page_name = $page_name;
		};
?>
<?php
/*Form Variables*/

/*End Form Variables*/
?>
<!--This page is to search the backup devices and allow Check in/out status changes.-->

<!--Search Bar-->
<h1><?php echo $full_page_name;?></h1>
<div>
	<?php include ("./layouts/tools/searchBar.php");?>
</div>
<!--Search Results-->
<div>
	<?php include ("./layouts/tables/backupDeviceSearchResult.php");?>
</div>

<?php include ("./layouts/bottom_framing.php");?>