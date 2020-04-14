<?php
	require '../../linkDB.php';
	if(isset($_GET['user']) && isset($_GET['key'])) {
		$sql="select * from session where session.user_id='".$_GET['user']."'";
		$result=mysqli_query($link,$sql);
		$key_dbms=mysqli_fetch_assoc($result);

		if(strcmp($_GET['key'],$key_dbms['session_id'])!=0)
			die("<h1>Access denied</h1>");
	}
	else
		die("<h1>Access denied</h1>");
?>