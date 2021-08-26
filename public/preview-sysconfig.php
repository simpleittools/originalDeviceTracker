<?php $page_title = "PREVIEW System Configuration"; ?>
<?php include("header.php"); ?>
<?php confirm_logged_in(); ?>
<br>
<?php
	$hostname = 'mail.ryanandjoe.com';
	$smtp_port = 587;
	$username = "notifications@ryanandjoe.com";
	$password = "97fb95Vl6";
	$domain_name = "texrus.com";
	$deliver_to = "ryan@ryanandjoe.com";
	$debug_setting = 0;
?>


	<div class="main-form" id="page">
		<h4>Notification Email Settings</h4>
	    <form action="sysconfig.php" method="post">
	    	<label for="hostname">Hostname:</label>
	    	<!--Pull this from the database, insert into the database-->
				<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="hostname" value="" />
			<label for="smtp_port">SMTP Port Number:</label>
			<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="smtp_port" value="" />
			<label for="username">Username:</label>
			<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="username" value="" />
			<label for="password">Password:</label>
			<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="password" value="" />
			<!--The Domain Name section is only needed to add to the end of a sender's username. This should not be a long term item if you add "user's email to the users database-->
			<label for="domain_name">Domain Name:</label>
			<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="domain_name" value="" />
			<label for="deliver_to">Deliver To:</label>
			<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="deliver_to" value="" />
			<label for="debug_setting">Debug Setting: (only change if instructed)</label>
			<input class="form-control" type="text" onkeypress="return tabE(this,event)" name="debug_setting" value="" />
	    	<input class="btn btn-primary"type="submit" name="submit" value="Save" />
	    	<a class="btn btn-danger" href="device_search.php">Cancel</a>
	    </form>
	</div>
	<!--Copy the above info to create any unique email configurations-->
</div>

<!--Need to make Database Table and connection-->