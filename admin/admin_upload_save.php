<?php
	require 'admin_authenticate.php';

	$sql='';
	if($_GET['type']=='tchr') {
		foreach(json_decode($_POST['frmFileUploadData'],true) as $x) {
			$sql.="insert into teacher(tchr_name,tchr_employee_id) values('".$x['name']."','".$x['id']."');";
			
		}
	}
	else if($_GET['type']=='std') {
		foreach(json_decode($_POST['frmFileUploadData'],true) as $x) {
			$sql.="insert into student(st_name,st_univ_roll) values('".$x['name']."','".$x['id']."');";
		}
	}
	else {
		die('Invalid Argument');
	}

	mysqli_multi_query($link,$sql);
	header('Location: admin_upload_form.php?user='.$_GET['user'].'&key='.$_GET['key'].'&type='.$_GET['type']);
?>