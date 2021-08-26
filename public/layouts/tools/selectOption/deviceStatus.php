<?php
	echo "<select class='form-control' name='status'>";
	//Move this to a function
		global $con;
		$sql="SELECT id, status FROM device_status";
		foreach ($con->query($sql) as $row){
			if ($row[id] == $status_id){
				echo "<option value=$row[id] selected>$row[status]</option>";
			} else {
				echo "<option value=$row[id]>$row[status]</option>";
			}
		}
	
	echo "</select>";
?>