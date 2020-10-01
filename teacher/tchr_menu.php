<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a class="navbar-brand" href="#" style="font-weight: bold;">EXAM COMPANION</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="index.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-home"></i> HOME</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="tchr_qstn_upload_form.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-file-upload"></i> UPLOAD QUESTION</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="tchr_create_qstn_set.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-clipboard-list"></i> CREATE QUESTION SET</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="tchr_search.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-search"></i> SEARCH STUDENT</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="tchr_search_qstn_set.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fab fa-searchengin"></i> SEARCH QUESTION SET</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="tchr_settings.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-cog"></i> SETTINGS</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="tchr_logout.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
			</li>
		</ul>
	</div>
</nav>