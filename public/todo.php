<?php include("header.php"); ?>

	<div class="container main-form">
		<h1>Backup Device Tracker Checklist</h1>
		<ul>
			<li><span class="done">Login</span>/Log out - Log In Created</li>
			<li>Device Check In/Out</li>
				<ul>
					<li class="done">search</li>
					<li class="done">In/Out date</li>
					<li class="done">User change by</li>
					<li>mgmt change</li>
				</ul>
			<li class="done">User Levels
				<ul>
					<li class="done">1 = Engineer</li>
					<li class="done">2 = Sr. Engineer</li>
					<li class="done">3 = Manager</li>
				</ul>
			</li>
			<li>Client Management</li>
				<ul>
					<li class="done">Add Clients</li>
					<li class="done">Retire Clients</li>
					<li class="done">Edit Clients</li>
				</ul>
			<li>Device Management</li>
				<ul>
					<li class="done">Add Devices</li>
					<li>Retire Devices - Devices need manual retire and propogated retire via client retire</li>
					<li>Edit Devices</li>
				</ul>
			<li class="done">User List - Created</li>
			<li class="done">User edit</li>
			<li>navbar</li>
			<li>Reports</li>
				<ul>
					<li>full device status</li>
					<li>full client list</li>
					<li>full user list</li>
				</ul>
			<li>refactor</li>
				<ul>
					<li>Move all SQL to functions</li>
					<ul>
						<li><a href="checkin.php">check_in</a></li>
						<li><a href="checkout.php">check_out</a></li>
						<li><a href="client_edit.php">client_edit</a></li>
						<li><a href="device_list.php">device_list</a> - not quite right. Need to re-run.</li>
						<li><a href="device_search.php">device_search</a></li>
						<li><a href="frozen.php">frozen</a></li>
						<li><a href="login.php">login</a></li>
						<li><a href="new_client.php">new_client</a></li>
						<li><a href="new_device.php">new_device</a></li>
						<li><a href="new_user.php">new_user</a></li>
						<li><a href="result.php">result</a></li>
						<li><a href="user_edit.php">user_edit</a></li>
						<li><a href="user_list.php">user_list</a></li>
					</ul>
				</ul>
		</ul>
		<h1>Links</h1>
		<ul>
			<li><a href="login.php">Log In</a></li>
			<li><a href="new_user.php">New User</a></li>
			<li><a href="user_list.php">User List</a></li>
			<li><a href="new_client.php">New Client</a></li>
			<li><a href="client_list.php">Client List</a></li>
			<li><a href="new_device.php">New Device</a></li>
			<li><a href="device_list.php">Device List</a></li>
			<li><a href="device_search.php">Device Search</a></li>
			<li class="codiad"><a class="codiad" href="http://codetrainer.ryanandjoe.com/codiad" target="_blank">Codiad</a></li>
		</ul>
	</div>
	
<?php include("footer.php"); ?>
	
