<?php
$page_name = "Inactive Client Device";

include ("./layouts/framing.php");

/*
Contains the general outline for all pages
*/
?>
<h1><?php echo $page_name;?></h1>

<div>
	<?php include ("./layouts/tables/tblInactiveClientsView.php");?>
</div>

<?php include ("./layouts/bottom_framing.php");?>