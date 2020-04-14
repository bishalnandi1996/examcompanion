<?php
	require 'tchr_authenticate.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<!--Bootstrap 4-->
	<link rel="stylesheet" type="text/css" href="../bootstrap-4/css/bootstrap.min.css" />
	<script src="../jquery-3.2.1.min.js"></script>
	<script src="../bootstrap-4/js/bootstrap.min.js"></script>
</head>
<body style="overflow-x: hidden;">
<div class="container">


<?php

	$sql="select * from question where question.qstn_id=".$_GET['qstn'];
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($result);

	echo "<div class='row d-flex justify-content-center'><h2 style='border: 4px double #ffffff; color: #ffffff; padding: 10px; margin-top: 10px; background: #000000;'>".strtoupper($row['qstn_name'])."</h2></div>";


	#start of file reading
	$filename='../questions/'.$_GET['qstn'];
	#Reads entire file into a string
	$file_content_raw=file_get_contents($filename);

	#Decryption
	$decrypt_file_content_raw=openssl_decrypt($file_content_raw,"aes-128-cbc",$row['qstn_key'],true,$row['qstn_vector']);

	#Decodes a JSON string
	$file_content_json= json_decode($decrypt_file_content_raw, true);

	$i=0;
	foreach($file_content_json as $qstn_set) {
		$j=0;
		echo '<div class="row" style="margin-bottom: 20px;">
				<div class="col-sm-12" style="border: 2px solid #000000;"> <b>'.++$i.'.</b> '.$qstn_set['question'].'</div>
				<div class="col-sm-6"><b>Answer:</b> '.$qstn_set[$qstn_set['answer']].'</div>
		</div>';
	}
	#end of file reading
?>

</div>
</body>
</html>
