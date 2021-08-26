<?php
$page_name = "User List";


include ("./layouts/userAdminFraming.php");

$full_page_name = $page_name;


/*
Contains the general outline for all pages
*/
?>
<?php
	$user_set = find_all_users();
?>

<h1><?php echo $full_page_name;?></h1>

<div>
	<?php include ("./layouts/tables/tblUserList.php");?>
</div>

<?php include ("./layouts/bottom_framing.php");?>


