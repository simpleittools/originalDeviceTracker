<div id="logout">
	<ul class="navbar-nav">
        <li class="nav-item dropdown dropleft">
        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        	<?php echo $username; ?>
        	</a>	
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="profileEdit.php?id=<?php echo urlencode($user_id); ?>">Profile</a>
				<a class="dropdown-item" href="./layouts/tools/buttons/logout.php">Log Out</a>
			</div>
		</li>
	</ul>
</div>