<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a class="navbar-brand" href="#">EXAM COMPANION</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="index.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-home"></i> HOME</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="st_view_result.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>" target='_blank'><i class="fas fa-clipboard-list"></i> VIEW RESULT</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="st_settings.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-cog"></i> SETTINGS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="st_logout.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
			</li>
		</ul>
	</div>
</nav>
