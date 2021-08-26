<?php
$page_name = "Add Client Device";

$actionPage =  "REPLACE ME";
include ("./layouts/framing.php");

$full_page_name = $page_name;

/*
Contains the general outline for all pages
*/
?>
<script>
$(document).ready(function(){
function getLocation(val) {
	$.ajax({
	type: "POST",
	url: "getLocation.php",
	data:'c_id='+val,
	success: function(data){
		$("#location-list").html(data);
	}
	});
}
})

</script>
<h1><?php echo $full_page_name;?></h1>

<div>

<!-- This script changes Enter to Tab. The 'onkeypress="return tabE(this,event)"' Needs to be added to any input field-->

	<!-- <form method='post' action="dropdownResult.php">
	<label style="font-size:20px" >Client:</label> -->
		    <form action="<?php $actionPage ;?>" method="post">
    	<?php if(isset($_GET['id'])){
		$c_id = $_GET['id'];
	} else {
		?> <label for="c_id">Client:</label> <?php
		$ops = client_select_loop();?>
		
		<select name="c_id" class="form-control">
    	<?php		
 		echo $ops;
 			$c_id = $ops;?>
			</select>
	<?php }; ?>

        
	
		<label style="font-size:20px" >Location:</label>
		<select id="location-list" name="location"  >
		<option value="">Select Location</option>
		</select>
		<input type="text" placeholder="this is just a test">
		<input type="submit" value='submit'>
	</form>


</div>

<?php include ("./layouts/bottom_framing.php");?>