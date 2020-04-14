<?php
	require 'tchr_authenticate.php';

	$sql="select * from question_assign where question_assign.qstn_id=".$_GET['q']." and question_assign.st_passout_year=".$_GET['p'];
	$result=mysqli_query($link,$sql);
	$url='Location: index.php?user='.$_GET['user'].'&key='.$_GET['key'].'&a=1';
	if(mysqli_num_rows($result)==0) {
		$sql="insert into question_assign(qstn_id,st_passout_year) values(".$_GET['q'].",".$_GET['p'].")";
		$result=mysqli_query($link,$sql);

		if($result)
			header($url);
		else
			die('Error Occured!');
	}
	else
		header($url);
?>