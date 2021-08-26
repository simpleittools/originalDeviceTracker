<?php
$page_name = "Profile Edit";
include ("./layouts/framing.php");
$user = find_user_by_id($_GET["id"]);
if (!$user) {
	redirect_to_home($home);
}
$actionPage =  'profileEdit.php?id=' . urlencode($user['id']);
include ('./layouts/tools/userUpdate.php');

if(isset($_GET['id'])){
			$user_id = $_GET['id'];
			$username_result = find_user_by_id($user_id);
			$full_page_name = $page_name . " for " . $username_result['FirstName'] . "&nbsp;" . $username_result['LastName'];
		} else {
			$full_page_name = $page_name;
		};

$userPermission = ($user['Permission']);
$startPage = ($user['start_page']);
?>
<h1><?php echo $full_page_name;?></h1>	



<div id="page">
	<?php include ('./layouts/forms/frmUserUpdate.php');?>
</div>

<?php include ("./layouts/bottom_framing.php");?>