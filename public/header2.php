<?php include("includes/config/config.php") ?>
<?php include("includes/functions/error_functions.php") ?>
<?php include("includes/functions/login_functions.php") ?>
<?php include("includes/functions/validation_functions.php") ?>
<?php include("includes/functions/functions.php") ?>
<?php $username = $_SESSION['username'];?>
<?php $user_id = $_SESSION['user_id'];?>

<?php
	global $con;
	$query  = "SELECT Permission ";
	$query .= "FROM users ";
	$query .= "WHERE id = {$user_id} ";
	$query .= "LIMIT 1";
	$permission_set = mysqli_query($con, $query);
	while($rows = mysqli_fetch_array($permission_set)){
		$permission=$rows['Permission'];
	};
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Device Tracker - <?php echo $page_title; ?></title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="includes/css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="includes/js/script.js"></script>
</head>
<body id='top'>
	
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
    	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
     		<span class="navbar-toggler-icon"></span>
    	</button>
    	<div class="collapse navbar-collapse" id="navbarNavDropdown">
    		<ul class="navbar-nav">
		        <li class="nav-item dropdown">
		        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		        	Menu
		        	</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<?php if ($permission > 2){?><a class="dropdown-item" href="new_client.php">Create Client</a><?php };?>
						<?php if ($permission > 0){?><a class="dropdown-item" href="new_device.php">Create Device</a><?php };?>
						<!-- <?php if ($permission >= 2){?><a class="dropdown-item" href="new_device_sr.php">Create Device - MGR</a><?php };?> -->
						<?php if ($permission > 2){?><a class="dropdown-item" href="new_user.php">Create User</a><?php };?>
						<!-- <?php if ($permission > 1){?><a class="dropdown-item" href="device_list.php">Device List</a><?php };?> -->
						<a class="dropdown-item" href="device_report.php">Device Report</a>
						<a class="dropdown-item" href="device_search.php">Device Search</a>
						<!-- <?php if ($permission >= 3){?><a class="dropdown-item" href="mgr_override.php">Management Override</a><?php };?> -->
						<hr>
						<a class="dropdown-item" href="user_list.php">User List</a>
						<a class="dropdown-item" href="user_search.php">User Search</a>
						<hr>
						<a class="dropdown-item" href="changelog.php">Changelog</a>
						<hr>
						Preview:
						<a class="dropdown-item" href="feedback.php">Feedback</a>
						<a class="dropdown-item" href="roadmap.php">Roadmap</a>
					</div>
				</li>
			</ul>
		</div>
		<div id="logout">
			<ul class="navbar-nav">
		        <li class="nav-item dropdown dropleft">
		        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		        	<?php echo $username; ?>
		        	</a>	
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="profile_edit.php?id=<?php echo urlencode($user_id); ?>">Profile</a>
						<a class="dropdown-item" href="logout.php">Log Out</a>
					</div>
				</li>
			</ul>
			
		</div>
	</nav>

    
 

    <h2><?php echo $page_title; ?></h2>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
