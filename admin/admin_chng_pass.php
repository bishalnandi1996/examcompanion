<?php
	require 'admin_authenticate.php';

    $sql="select username from admin";
    $result=mysqli_query($link,$sql);
    $user=mysqli_fetch_assoc($result);

	$pass_old=mysqli_real_escape_string($link,$_POST['frm_current_pass']);
	$pass_new=mysqli_real_escape_string($link,$_POST['frm_new_pass']);

	$sql="select password from admin where admin.username='".$user['username']."'";
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($result);

	if(password_verify($pass_old,$row['password'])==TRUE) {
		$pass_new=password_hash($pass_new,PASSWORD_DEFAULT);
		$sql="update admin set password='".$pass_new."' where admin.username='".$user['username']."'";
		mysqli_query($link,$sql);
		header('Location: admin_settings.php?user='.$_GET['user'].'&key='.$_GET['key'].'&pass=1');
	}
	else
	header('Location: admin_settings.php?user='.$_GET['user'].'&key='.$_GET['key'].'&pass=0');
?>