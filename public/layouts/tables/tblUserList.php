<table class="table table-striped table-light table-hover edge">
	<thead>
		<tr>
			<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Permission Level</th>
			<?php if ($permission > 2){?><th>Edit</th><?php };?>
			
		</tr>
	</thead>
	<tbody>
		   <?php foreach($user_set as $user) { ?>
		      <tr>
		        <td><?php echo htmlentities($user["username"]); ?></td>
		        <td><?php echo htmlentities($user["FirstName"]); ?></td>
		        <td><?php echo htmlentities($user["LastName"]); ?></td>
		        <td><?php if ($user["Permission"] == 1) {
		        		echo 'Engineer';
		        	} elseif ($user["Permission"] == 2) { 
		        		echo 'Senior Engineer';
		        	} elseif ($user["Permission"] == 3) { 
		        		echo 'Manager';
		        	} else { 
		        		echo 'Developer';
		        	};?></td>
		        <?php if ($permission > 2){?><td><a href="profileEdit.php?id=<?php echo urlencode($user["id"]); ?>">Edit</a></td><?php };?>
		        
		      </tr>
		    <?php } ?>
	</tbody>
</table>