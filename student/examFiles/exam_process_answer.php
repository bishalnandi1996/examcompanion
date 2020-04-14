<?php
	require 'exam_authenticate.php';

	$numQstn=0; #count number of total question
	$ansQstn=0; #count number of answered question
	#$count=1; #count number of previous attempt of same question
	
	$ansJson= new stdClass(); #for recording the answer
	$i=1;

	foreach($_POST['examOption'] as $answer) {
		$ansJson->$i=new stdClass();
		if(array_key_exists(0,$answer)) {
			if(strcmp(strval($answer[0]),strval($answer[1]))==0) {
				$ansQstn++;
			}
			$ansJson->$i->orgAnswer=strval($answer[1]);
			$ansJson->$i->usrAnswer=strval($answer[0]);
		}
		else {
			$ansJson->$i->orgAnswer=strval($answer[1]);
			$ansJson->$i->usrAnswer='';
		}
		$numQstn++;
		$i++;
	}

	$score= ($ansQstn/$numQstn)*100;

	$student=explode('_',$_GET['user']);

	#checking for previous attempts
	$sql="select result.attempt_count as attempt from result where result.st_id=".$student[1]." and result.qstn_id=".$_GET['qstn'];
	$result=mysqli_query($link,$sql);
	#count previous number of attempt
	$count=mysqli_num_rows($result);
	$count++;

	$ansJson=json_encode($ansJson);
	$file_key=substr(hash("md5",rand(),FALSE),0,16); # key for encryption and decryption
	$iv=substr(hash("md5",rand(),FALSE),0,16); # $iv=initial vector
	$ansFile=openssl_encrypt($ansJson,"aes-128-cbc",$file_key,TRUE,$iv);


	#inserting result to database
	$sql="insert into result(st_id,qstn_id,res_result,attempt_count,exam_date,res_key,res_iv) values(".$student[1].",".$_GET['qstn'].",".$score.",".$count.",'".date('Y-m-d')."','".$file_key."','".$iv."')";
	mysqli_query($link,$sql);

	#fetching data for filename
	$sql="select result.res_id as res_id from result where result.st_id=".$student[1]." and result.qstn_id=".$_GET['qstn']." and result.attempt_count=".$count;
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($result);

	#writing encrypted data to file
	$file_name=$row['res_id'];
	$file_handle=fopen("../../result/".$file_name,"w");
	fwrite($file_handle,$ansFile);
	fclose($file_handle);

	echo "You have scored: ".$score."%";
	echo "<br/><button type='button' onclick='window.close();'>Click Here to Continue</button>"

?>
