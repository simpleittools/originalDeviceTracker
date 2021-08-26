<?php if (isset($_GET["status"]) && $_GET["status"] == "thanks"){
			echo "<p>Thanks for the email! I will check out your feedback shortly!</p>";
		} else {
			if (isset($error_message)){
				echo '<p class="message">'.$error_message.'</p>';
			} else { 
				echo '<p>Please let me know of any bugs or additional features needed.</p>';
			}
		?>


<form action="support.php" method="post">
	<label for="title">Title:</label>
		<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="title" value="" />
	<label for="category">Select Feedback Type:</label>
	<select name="category" id="category" class='form-control'>
		<option value="bug">Bug Fix Report</option>
		<option value="change">Change Request</option>
		<option value="feature">Feature Request</option>
	</select>
	
	<label for="desciption">Description:(Do NOT use Insert Image.)</label>
	
  		<textarea name="description" id="description" class="form-control description summernote"></textarea>
  	
	<input class="btn btn-primary"type="submit" name="submit" value="Send Feedback" />
	<?php include("./layouts/tools/buttons/btnCancelButton.php"); ?>
<?php } ?>

<script src="includes/vendor/summernote/dist/summernote-bs4.js"></script>
<script>
	$(document).ready(function() {
        $('textarea').summernote({
        	height: 200,
        });
    });
    

</script>
</form>