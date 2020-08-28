<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a class="navbar-brand" href="#">EXAM COMPANION</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="admin_home.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-chart-bar"></i> DASHBOARD</a>
			</li>
			<!-- <li class="nav-item">
				<a class="nav-link" href="admin_departments.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-university"></i> DEPARTMENTS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="admin_subjects.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-book"></i> SUBJECTS</a>
			</li> -->
			<li class="nav-item">
				<a class="nav-link" href="admin_upload_form.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-file-upload"></i> UPLOAD DATA</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="admin_settings.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-cog"></i> SETTINGS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="admin_logout.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
			</li>
		</ul>
	</div>
</nav>