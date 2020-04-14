<?php
	require '../linkDB.php';

	$name=mysqli_real_escape_string($link,$_POST['frmSignupName']);
	$stream=mysqli_real_escape_string($link,$_POST['frmSignupStrm']);
	$univRoll=mysqli_real_escape_string($link,$_POST['frmSignupUnivRoll']);
	$passYear=mysqli_real_escape_string($link,$_POST['frmPassoutYear']);
	$email=mysqli_real_escape_string($link,$_POST['frmSignupEmail']);
	$pass=mysqli_real_escape_string($link,$_POST['frmSignupPassword']);

	$pass_hash=password_hash($pass,PASSWORD_DEFAULT);

	$sql="update student set strm_id=".$stream.", st_passout_year=".$passYear.", st_email='".$email."', st_password='".$pass_hash."', st_signup=1 where st_name='".$name."' and st_univ_roll=".$univRoll;
	$result=mysqli_query($link,$sql);
	
	if($result)
		header('Location: ../index.php?s_signup=1#studentlogin');
	else
		die("Error Occured");
?>
