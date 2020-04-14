<?php
	require 'st_authenticate.php';

	$user=explode('_',$_GET['user']);

	$pass_old=mysqli_real_escape_string($link,$_POST['frm_current_pass']);
	$pass_new=mysqli_real_escape_string($link,$_POST['frm_new_pass']);

	$sql="select st_password from student where st_id=".$user[1];
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($result);

	if(password_verify($pass_old,$row['st_password'])==TRUE) {
		$pass_new=password_hash($pass_new,PASSWORD_DEFAULT);
		$sql="update student set st_password='".$pass_new."' where student.st_id=".$user[1];
		mysqli_query($link,$sql);
		header('Location: st_settings.php?user='.$_GET['user'].'&key='.$_GET['key'].'&pass=1');
	}
	else
	header('Location: st_settings.php?user='.$_GET['user'].'&key='.$_GET['key'].'&pass=0');
?>