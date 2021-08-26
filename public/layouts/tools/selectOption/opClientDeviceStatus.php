<?php
	echo "<select class='form-control' name='Permission'>";
	//Move this to a function
		global $con;
		$sql="SELECT * FROM permissions";
		foreach ($con->query($sql) as $deviceStatus){
			if ($deviceStatus[id] == $clientDeviceStatus){
				echo "<option value=$deviceStatus[id] selected>$deviceStatus[status]</option>";
			} else {
				echo "<option value=$deviceStatus[id]>$deviceStatus[status]</option>";
			}
		}
	
	echo "</select>";
?>