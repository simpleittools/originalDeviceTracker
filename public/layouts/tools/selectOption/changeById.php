<?php
	echo "<select class='form-control' name='change_by_id'>";
	//Move this to a function
		global $con;
		$query = "SELECT id, FirstName FROM users ORDER BY FirstName";
		foreach ($con->query($query) as $row2){
			if($row2[id] == $change_by_id){
				echo "<option value=$row2[id] selected>$row2[FirstName]</option>";
			} else {
				echo "<option value=$row2[id]>$row2[FirstName]</option>";
			}
		}
	echo "</select>"
				?>