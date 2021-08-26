<?php
/*
Contains overall page layout as well as the opening content div
Does NOT contain the footer. That is added to the pages individually
*/
include ("./layouts/header.php");

?>
	<div class="row"> <!--Begin Main Form Div-->
		<div class="col-sm-2"> <!--Begin Sidebar Div-->
			<?php include ("layouts/sidebar.php");?>
		</div><!--End Sidebar Div-->
	
		<div class="row col-sm-10 col-lg-8"><!--Begin Main Content Div-->
			<div class="container "><!--Begin Main Content Container-->
			