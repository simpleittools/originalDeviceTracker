<?php
$page_name = "User Management";

include ("./layouts/userAdminFraming.php");

/*
Contains the general outline for all pages
*/
?>
<h1><?php echo $page_name;?></h1>
<span class='message'><?php echo message();?></span>
<div>
	<?php include ("./layouts/grids/userManagementGrid.php");?>
</div>

<?php include ("./layouts/bottom_framing.php");?>