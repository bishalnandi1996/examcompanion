<?php
	require 'tchr_authenticate.php';

	$user=explode('_',$_GET['user']);

	$pass_old=mysqli_real_escape_string($link,$_POST['frm_current_pass']);
	$pass_new=mysqli_real_escape_string($link,$_POST['frm_new_pass']);

	$sql="select tchr_password from teacher where tchr_id=".$user[1];
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($result);

	if(password_verify($pass_old,$row['tchr_password'])==TRUE) {
		$pass_new=password_hash($pass_new,PASSWORD_DEFAULT);
		$sql="update teacher set tchr_password='".$pass_new."' where teacher.tchr_id=".$user[1];
		mysqli_query($link,$sql);
		header('Location: tchr_settings.php?user='.$_GET['user'].'&key='.$_GET['key'].'&pass=1');
	}
	else
	header('Location: tchr_settings.php?user='.$_GET['user'].'&key='.$_GET['key'].'&pass=0');
?>