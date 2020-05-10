<?php
	require '../linkDB.php';
	$name=mysqli_real_escape_string($link,$_POST['frmSignupName']);
	$stream=mysqli_real_escape_string($link,$_POST['frmSignupStrm']);
	$employeeID=mysqli_real_escape_string($link,$_POST['frmSignupEmployeeId']);
	$ph=mysqli_real_escape_string($link,$_POST['frmSignupPh']);
	$email=mysqli_real_escape_string($link,$_POST['frmSignupEmail']);
	$pass=mysqli_real_escape_string($link,$_POST['frmSignupPassword']);

	$pass_hash=password_hash($pass,PASSWORD_DEFAULT);
	
	$sql="update teacher set strm_id=".$stream.", tchr_mobile=".$ph.", tchr_email='".$email."', tchr_password='".$pass_hash."', tchr_signup=1 where tchr_name='".$name."' and tchr_employee_id='".$employeeID."'";
	$result=mysqli_query($link,$sql);

	if($result)
		header('Location: ../index.php?t_signup=1#teacherlogin');
	else
		die("Error Occured");
?>