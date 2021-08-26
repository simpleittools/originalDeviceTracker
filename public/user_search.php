<?php $page_title = "User Search"; ?>
<?php include("header.php");?>
<?php confirm_logged_in(); ?>

<div class="container main" id="center">
			<center><form action="user_search.php" method="POST">
				<fieldset>
					<input class="form-control" type="text" id="Search" Name="Search" value="" placeholder="Search by Username, First Name or Last Name" autofocus>
					<input class="btn btn-primary" type="Submit" id="SearchButton" Name="SearchButton" value="Search">
				</fieldset>
			</form></center>
</div>

		<div class="container main-form">
<?php
	$con;
	if(isset($_POST['SearchButton'])){
		$search=$_POST['Search'];
		$search_query="SELECT * FROM users
			WHERE FirstName LIKE '%$search%' OR LastName LIKE '%$search%' OR username LIKE '%$search%' ";
		$execute=mysqli_query($con,$search_query);
		while($rows = mysqli_fetch_array($execute)){
			$id=$rows['id'];
			$username=$rows['username'];
			$FirstName=$rows['FirstName'];
			$LastName=$rows['LastName'];

?>
	
		<table class="table table-striped table-light table-hover">
			<!-- <caption>Search Results</caption> -->
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Full Name</th>
				<?php if ($permission > 2){?><th>Edit</th><?php };?>
			</tr>
		<tr>
		<!--
			**************************************
			Results from the table
			**************************************
		-->
			<td><?php echo $id; ?></td>
			<!--
				******************************************************************************************
				takes the ClientID from the devices table and translates to client_name from clients table
				All of these should probably be functions
				******************************************************************************************
			-->
			<td><?php echo $username; ?></td>
			<td><?php echo $FirstName." ".$LastName; ?></td>
			<?php if ($permission > 2){?><td><a href="user_edit.php?id=<?php echo urlencode($rows["id"]); ?>">Edit</a></td><?php };?>

		</tr>
		<?php
			}; //closes the initial database search loop
		?>
		</table>
		</div>
	</div>
<?php
		}
	
?>