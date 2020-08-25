<?php
	require 'exam_authenticate.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>examcompanion</title>
	<!--Bootstrap 4-->
	<link rel="stylesheet" type="text/css" href="../../bootstrap-4/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../../fontawesome-5/css/all.css" />
	<script src="../../jquery-3.2.1.min.js"></script>
	<script src="../../bootstrap-4/js/bootstrap.min.js"></script>
	<script src="exam.js"></script>

	<style>
		.input-group {
			margin-top: 10px;
		}
		progress {
			width: 100%;
			height: 100%;
		}
	</style>

</head>
<body style="overflow-x: hidden;">
<div class="container">


<div class="row" style='margin: 40px;'><!--####exam timer####-->
	<div class="col-sm-12" id="examTimeStatus"></div>
	<div class="col-sm-12 d-flex justify-content-center" style="font-weight: bold;">TIME LEFT:&nbsp;<div id="examTimeCount"></div></div>
</div>


<?php

	$sql="select * from question where question.qstn_id=".$_GET['qstn'];
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($result);

	#exam timer
	echo "<script> examTime(".$row['time']."); </script>";
	
	#start of file reading
	$filename='../../questions/'.$_GET['qstn'];
	#Reads entire file into a string
	$file_content_raw=file_get_contents($filename);

	#Decryption
	$decrypt_file_content_raw=openssl_decrypt($file_content_raw,"aes-128-cbc",$row['qstn_key'],true,$row['qstn_vector']);

	#Decodes a JSON string
	$file_content_json= json_decode($decrypt_file_content_raw, true);

	echo '<form action="exam_process_answer.php?user='.$_GET['user'].'&key='.$_GET['key'].'&qstn='.$_GET['qstn'].'" id="examFrm" method="post">';
	$i=0;
	foreach($file_content_json as $qstn_set) {
		$j=0;
		echo '<div class="form-group" style="font-size: 18px;">
				<label class="col-form-label"> '.($i+1).'. '.$qstn_set['question'].'</label>
				
				<div>
					<input type="radio" name="examOption['.$i.']['.$j.']" value="'.$qstn_set['a'].'" > '.$qstn_set['a'].'
					<input type="radio" name="examOption['.$i.']['.$j.']" value="'.$qstn_set['b'].'" > '.$qstn_set['b'].'
					<input type="radio" name="examOption['.$i.']['.$j.']" value="'.$qstn_set['c'].'" > '.$qstn_set['c'].'
					<input type="radio" name="examOption['.$i.']['.$j.']" value="'.$qstn_set['d'].'" > '.$qstn_set['d'].'
				</div>

				<div>
					<input type="hidden" name="examOption['.$i.']['.++$j.']" value="'.$qstn_set[$qstn_set['answer']].'" />
				</div>
				
				<button type="button" class="btn btn-danger btn-sm" onclick="frmQstnReset('.$i.')"><i class="fas fa-redo"></i> RESET ANSWER</button>
		</div><hr/>';
		$i++;
	}
	echo '</form>';

	echo '<div class="row">
		<div class="col-sm-12"><button type="button" class="btn btn-success btn-lg btn-block" onclick="submitAnswer()"><i class="fas fa-paper-plane"></i> SUBMIT ANSWER</button></div>
	</div>';
	#end of file reading
?>

<div class="row" style="height: 50px;">
</div>


</div>


</body>
</html>
