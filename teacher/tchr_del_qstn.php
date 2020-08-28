<?php
	require 'tchr_authenticate.php';

	$sql="delete from question_assign where question_assign.qstn_id=".$_GET['qstn'];
	mysqli_query($link,$sql);
	
	$sql="select * from result where result.qstn_id=".$_GET['qstn'];
	$result=mysqli_query($link,$sql);
	while($row=mysqli_fetch_assoc($result)) {
		$file='../result/'.$row['res_id'];
		unlink($file);
	}
	
	$sql="delete from result where result.qstn_id=".$_GET['qstn'];
	mysqli_query($link,$sql);
	$file='../questions/'.$_GET['qstn'];
	unlink($file);
	
	$sql="delete from question where question.qstn_id=".$_GET['qstn'];
	mysqli_query($link,$sql);

	header('Location: index.php?user='.$_GET['user'].'&key='.$_GET['key'])
?>