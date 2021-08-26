<?php
$page_name = "New User";
$actionPage =  "newUser.php";
include ("./layouts/userAdminFraming.php");

?>

<!--
	THIS CHECKS USER PERMISSIONS
-->
<?php
	if($permission != 3 and $permission != 4){
		redirect_to("deny.php");
	};
?>
<?php

include ("./layouts/tools/userInsert.php");
if(isset($_GET['id'])){
			$user_id = $_GET['id'];
			$username_result = find_user_by_id($user_id);
			$full_page_name = $page_name . " for " . $username_result['FirstName' . "LastName"];
		} else {
			$full_page_name = $page_name;
		};
?>
<h1><?php echo $full_page_name;?></h1>	
<div>
	<?php include ("./layouts/forms/frmNewUser.php");?>
</div>

<?php include ("./layouts/bottom_framing.php");?>