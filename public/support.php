<?php
$page_name = "Contact Support";

$actionPage =  "REPLACE ME";
include ("./layouts/framing.php");

/*
Contains the general outline for all pages
*/
?>
<h1><?php echo $page_name;?></h1>
<?php include('./layouts/tools/processors/support/supportEmail.php'); ?>
<div>
	<?php include('./layouts/forms/frmSupport.php');?>
</div>

<?php include ("./layouts/bottom_framing.php");?>