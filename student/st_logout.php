<?php
	require 'st_authenticate.php';

	$sql="delete from session where session.user_id='".$_GET['user']."'";
	$result=mysqli_query($link,$sql);
	if($result)
		header('Location: ../index.php#studentlogin');
	else
		die("Erroe Occured");
?>