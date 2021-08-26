<?php
	echo "<select class='form-control' name='c_id'>";
		//Move this to a function
		$client = "SELECT id, client_name FROM clients";
		foreach ($con->query($client) as $row){
			if($row[id] ==$client_id){
				echo "<option value=$row[id] selected>$row[client_name]</option>";
			} else {
				echo "<option value=$row[id]>$row[client_name]</option>";
			}
		}
	echo "</select>";
?>