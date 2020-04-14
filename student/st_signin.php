<?php
	require '../linkDB.php';

	$email=mysqli_real_escape_string($link,$_POST['frmSigninEmail']);
	$pass=mysqli_real_escape_string($link,$_POST['frmSigninPassword']);

	$sql="select * from student where student.st_email='".$email."'";
	$result=mysqli_query($link,$sql);

	if(mysqli_num_rows($result)==1) {
		$row_fetch=mysqli_fetch_assoc($result);
		if(password_verify($pass,$row_fetch['st_password'])==TRUE) {
			$key=hash("md5",rand(),FALSE);
			$user="st_".$row_fetch['st_id'];

			$sql="delete from session where session.user_id='".$user."'";
			$result=mysqli_query($link,$sql);

			$sql="insert into session(user_id,session_id) values('".$user."','".$key."')";
			$result=mysqli_query($link,$sql);
			if($result)
				header('Location: index.php?user='.$user.'&key='.$key);
			else
				die('Error Occured');
		}
		else
			header('Location: ../index.php?s_login=0#studentlogin');
	}
	else
		header('Location: ../index.php?s_user=0#studentlogin');
?>