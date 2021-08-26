<?php
$page_name = "All Clients";

include ("./layouts/clientAdminFraming.php");

?>
<h1><?php echo $page_name;?></h1>
<div>
	<?php include "./layouts/tables/tblAllClientsView.php"?>
</div>

<?php include ("./layouts/bottom_framing.php");?>