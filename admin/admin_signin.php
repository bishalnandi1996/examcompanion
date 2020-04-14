<?php
	require '../linkDB.php';

	$user=mysqli_real_escape_string($link,$_POST['frmSigninUser']);
	$pass=mysqli_real_escape_string($link,$_POST['frmSigninPassword']);


	$sql="select * from admin where admin.username='".$user."'";
	$result=mysqli_query($link,$sql);

	if(mysqli_num_rows($result)==1) {
		$row_fetch=mysqli_fetch_assoc($result);
		if(password_verify($pass,$row_fetch['password'])==TRUE) {
			$key=hash("md5",rand(),FALSE);
			$user='0';

			$sql="delete from session where session.user_id='".$user."'";
			$result=mysqli_query($link,$sql);

			$sql="insert into session(user_id,session_id) values('".$user."','".$key."')";
			$result=mysqli_query($link,$sql);
			if($result)
				header('Location: admin_home.php?user='.$user.'&key='.$key);
			else
				die('Error Occured');
		}
		else
			header('Location: index.php?login=0');
	}
	else
		header('Location: index.php?login=0')
?>