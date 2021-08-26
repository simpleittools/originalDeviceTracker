<?php
$page_name = "Password Reset";


include ("./layouts/framing.php");
if(isset($_GET['id'])){
			$user_id = $_GET['id'];
			$username_result = find_user_by_id($user_id);
			$full_page_name = $page_name . " for " . $username_result['FirstName'] . "&nbsp;" . $username_result['LastName'];
		} else {
			$full_page_name = $page_name;
		};
/*
Contains the general outline for all pages
*/
$actionPage ='changePassword.php?id=' . urlencode($user_id);
?>
<h1><?php echo $full_page_name;?></h1>

<div>
	<?php include ('./layouts/forms/frmPasswordChange.php');?>
</div>

<?php include ("./layouts/bottom_framing.php");?>