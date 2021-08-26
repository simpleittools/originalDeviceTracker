<?php
	echo "<select class='form-control' name='start_page'>";
	//Move this to a function
		global $con;
		$sql="SELECT * FROM pages ORDER BY startPages ASC";
		foreach ($con->query($sql) as $startPageOption){
			if ($startPageOption[url] == $startPage){
				echo "<option value=$startPageOption[url] selected>$startPageOption[startPages]</option>";
			} else {
				echo "<option value=$startPageOption[url]>$startPageOption[startPages]</option>";
			}
		}
	
	echo "</select>";
?>