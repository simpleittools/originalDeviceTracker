<?php
include ('locationProcessor.php');
$page_name = "Add Client Device";

$actionPage =  "REPLACE ME";
include ("./layouts/framing.php");

$full_page_name = $page_name;

/*
Contains the general outline for all pages
*/
?>
<h1><?php echo $full_page_name;?></h1>

<div>
	<?php include ("./layouts/forms/frmNewClientDevice.php");?>
</div>

<?php include ("./layouts/bottom_framing.php");?>