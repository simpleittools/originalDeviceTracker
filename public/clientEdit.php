<?php
$page_name = "Client Edit";
include ("./layouts/clientAdminFraming.php");
$client = find_client_by_id($_GET["id"]);
$actionPage =  "clientEdit.php?id=" . urlencode($client['id']);
if (!$client) {
	redirect_to_home($home);
}
include ('./layouts/tools/processors/clientProcessors/clientUpdateProcessor.php');

if(isset($_GET['id'])){
			$client_id = $_GET['id'];
		};
?>
<span class='message'><?php echo message();?></span>
<h1><?php echo $page_name;?></h1>	
<?php $client_status = $client['enabled'];?>
<?php $status = $client_status;?>


<div id="page">
	<?php include ('./layouts/forms/frmClientUpdate.php');?>
</div>

<?php include ("./layouts/bottom_framing.php");?>