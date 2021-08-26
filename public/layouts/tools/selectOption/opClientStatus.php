<?php
	echo "<select class='form-control' name='enabled' id='enabled'>";
	//Move this to a function
		global $con;
		$sql="SELECT * FROM status";
		foreach ($con->query($sql) as $clientStatus){
			if ($clientStatus[id] == $status){
				echo "<option value=$clientStatus[id] selected>$clientStatus[status_name]</option>";
			} else {
				echo "<option value=$clientStatus[id]>$clientStatus[status_name]</option>";
			}
		}
	
	echo "</select>";
?>