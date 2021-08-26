<?php
$page_name = "REPLACE ME";

$actionPage =  "REPLACE ME";
include ("./layouts/framing.php");
if(isset($_GET['id'])){
			$client_id = $_GET['id'];
			$client_name_result = SELECT CORRECT FUCTION(SELECT CORRECT VARIABLE);
			$full_page_name = $page_name . " for " . $client_name_result['client_name'];
		} else {
			$full_page_name = $page_name;
		};

/*
Contains the general outline for all pages
*/
?>
<h1><?php echo $full_page_name;?></h1>

<?php include ("./layouts/bottom_framing.php");?>