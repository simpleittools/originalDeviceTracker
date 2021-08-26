<?php include("includes/config/config.php") ?>
<?php include("includes/functions/error_functions.php") ?>
<?php include("includes/functions/login_functions.php") ?>
<?php include("includes/functions/validation_functions.php") ?>
<?php include("includes/functions/functions.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="includes/css/styles.css">
</head>
<body>
<!--
	THIS LOGS USERS IN
-->
<?php
$username = "";

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);
  
  if (empty($errors)) {
    // Attempt Login

		$username = $_POST["username"];
		$password = $_POST["password"];
		
		$found_user = attempt_login($username, $password);

    if ($found_user) {
      // Success
			// Mark user as logged in
			$_SESSION["user_id"] = $found_user["id"];
			$_SESSION["username"] = $found_user["username"];
      redirect_to("device_search.php");
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>


<div class="main">
  <div id="navigation">
    &nbsp;
  </div>
  <div class="container col-lg-4 edge" id="page">

	<?php echo message(); ?>
    <?php //echo form_errors($errors); ?>

    <h2>Login</h2>
    <form action="login.php" method="post">
      <p>Username:
        <input class="form-control" type="text" name="username" value="<?php echo htmlentities($username); ?>" />
      </p>
      <label for="password">Password:</label>
        <input class="form-control" type="password" name="password" value="" />
      </p>
      <input class="btn btn-submit" type="submit" name="submit" value="Submit" />
    </form>
  </div>
</div>

<?php
	include ("footer.php")
?>