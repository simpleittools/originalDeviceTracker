<?php
$page_name = "Add New Client";
$actionPage = "addClient.php";

include ("./layouts/framing.php");
if(isset($_GET['id'])){
			$client_id = $_GET['id'];
			$client_name_result = find_client_name_by_id($client_id);
			$full_page_name = $page_name . " for " . $client_name_result['client_name'];
		} else {
			$full_page_name = $page_name;
		};
?>
<h1><?php echo $full_page_name;?></h1>
<?php
/*Form Variables*/
$labelInputName = "client_name";
$displayName = 'Client Name';
$submitButtonValue = "Add Client";
$cancelLocationValue = "backupDeviceSearch.php";
$submitButtonName = "submit";
$submitButtonID = 'submit';
/*End Form Variables*/
/*SQL Inserts*/
include ("./layouts/tools/clientInsert.php");
/*End SQL Inserts*/

?>

<div>
	<?php include ("./layouts/forms/frmNewClientInput.php");?>
</div>

<?php include ("./layouts/bottom_framing.php");?>