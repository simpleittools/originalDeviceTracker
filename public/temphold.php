<?php
					$con;
					$query = "SELECT * FROM users ORDER BY FirstName";
					$execute = mysqli_query($con, $query);
					while($rows = mysqli_fetch_array($execute)){
						$user_name=$rows['username'];
						$first_name=$rows['FirstName'];
						$last_name=$rows['LastName'];
						$permission=$rows['Permission'];
					
				?>

				<tr>
					<td><?php echo $first_name; ?></td>
					<td><?php echo $last_name; ?></td>
					<td><?php echo $user_name; ?></td>
					<td><?php echo $permission; ?></td>
					<td><a href="user_edit.php">Edit</a></td>
					
					<?php } ?>
				</tr>