<?php include_once ("./includes/config/db.php");?>
<?php include("includes/functions/sql_functions.php");?>
<?php include("includes/functions/functions.php");?>
<?php confirm_logged_in(); ?>
<?php $date_info = date("Y.m.d h:i A");?>
<?php $home = "./backupDeviceSearch.php";?>
<?php $username = $_SESSION['username'];?>
<?php $user_id = $_SESSION['user_id'];?>
<?php $date_info = date("Y.m.d h:i A");?>
<?php $permission = check_permission($user_id);?>
<?php $uname = find_user_by_username($username);
$start_page = $uname['start_page'];?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Device Tracker - <?php echo $page_name;?></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="includes/stylesheets/css.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!-- Booststrap compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- Font Awesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- Summernote css -->
	<link href="includes/vendor/summernote/dist/summernote-bs4.css" rel="stylesheet">

</head>
<body>
	<div class="container-fluid"> <!--set the main container as fluid-->
		<div class="header-footer-border"></div>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<a class="navbar-brand" href="<?php echo $start_page;?>">Home</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar" id="navbarNavAltMarkup">
					<ul class="navbar-nav">
						<li class='nav-item'>
							<a class = "nav-link" href="backupDeviceSearch.php">Backup Device Tracker</a>
						</li>
						<!--<li class='nav-item'>
							<a class ="nav-link" href="addClientDevice.php" target="_blank">Client Device Management</a>
						</li>-->
						<!-- <li class="nav-item">
							<a class="nav-link" href="#">Helpdesk Ticket<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Device Tracker</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">KB</a>
						</li> -->
						<?php
							if ($permission == 3 or $permission == 4) {
						?>
							<li class="nav-item">
								<a class="nav-link" href="userManagement.php">User Management</a>
							</li>
						<?php
						}
						?>
						<?php
							if ($permission == 3 or $permission == 4) {
						?>
							<li class="nav-item">
								<a class="nav-link" href="clientManagement.php">Client Management</a>
							</li>
						<?php
						}
						?>
						<?php
							if ($permission == 3 or $permission == 4) {
						?>
							<!--<li class="nav-item">
								<a class="nav-link" href="system_administration.php" target="_blank">System Management</a>
							</li>-->
						<?php
						}
						?>
					</ul>
				</div>
				
				<div class="mx-auto order-0">
				<!-- <?php include ("layouts/notifications/notification_bar.php");?> -->
				</div>
				<div class="navbar-nav ml-auto">
					<?php include ('./layouts/tools/controls/profileControl.php');?>
				</div>
			</nav>
		<div class="header-footer-border"></div>