<?php
/*
New Ticket
Open Tickets (counter)
Pending Tickets (waiting on more details - couter)
Closed Tickets (for review - counter)
Reports?
*/

?>

<nav class="navbar" role="navigation">
<!--<div class="container">-->
<ul id="leftMenu" class="no-bullet">
	<button class="navbar-toggler menuRotate" id="side-menu" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
		<i class="far fa-caret-square-right"></i>
	</button>
	<div class="collapse navbar-collapse" id="sidebar">
	<li><a href="allClients.php"><i class="fas fa-plus"></i>&nbsp;All Clients</a></li>
	<li><a href="activeClients.php"><i class="fas fa-plus"></i>&nbsp;Active Clients</a></li>
	<li><a href="inactiveClients.php"><i class="fas fa-plus"></i>&nbsp;Inactive Clients</a></li>
	<!--<li><a href="buDeviceOverride.php"><i class="fab fa-black-tie"></i>&nbsp;BU Device Override</a></li>
	<li><a href="addClient.php"><i class="fas fa-building"></i>&nbsp;Add Client</a></li>
	<li><a href="addLocation.php"><i class="fas fa-globe"></i>&nbsp;Add Location</a></li>
	<li><a href="clientDetails.php"><i class="fas fa-yin-yang"></i>&nbsp;Client Details</a></li>-->

	<li><a href="reports.php"><i class="fas fa-chart-bar"></i>&nbsp;Reports</a><!--These reports will be running in Tabulator and so they can be dynamically searched--></li>
	</div>
</ul>
<!--</div>-->
</nav>