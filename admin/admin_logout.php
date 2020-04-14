<?php
	require 'admin_authenticate.php';

	$sql="delete from session where session.user_id='".$_GET['user']."'";
	$result=mysqli_query($link,$sql);
	if($result)
		header('Location: index.php');
	else
		die("Erroe Occured");
?>
