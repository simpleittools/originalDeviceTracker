<?php
$page_name = "Login";
$actionPage =  "index.php";
?>
<?php include("includes/config/db.php");?>
<?php include("includes/functions/sql_functions.php");?>
<?php include("includes/functions/functions.php");?>
<?php $date_info = date("Y.m.d h:i A");?>
<?php include ("./layouts/tools/processors/loginProcess.php");?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Device Tracker - 
			<?php if(isset($_GET['id'])){
				$client_id = $_GET['id'];
				$client_name_result = find_client_name_by_id($client_id);
				$full_page_name = $page_name . " for " . $client_name_result['client_name'];
			} else {
				$full_page_name = $page_name;
			};
			?>
				<?php echo $page_name;?></title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="includes/stylesheets/css.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<!-- Booststrap compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<!-- Font Awesome CDN-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	</head>
	<body>
		<div class="main">
  			<div id="navigation">
   				 &nbsp;
  			</div>
  			<div class="container col-lg-4 edge" id="page">

				<?php echo message(); ?>
	    		<?php //echo form_errors($errors); ?>
					<?php include ("./layouts/forms/frmLogin.php");?>
			</div>
		</div>
		
	</body>
</html>