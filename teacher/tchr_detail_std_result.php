<?php
    require 'tchr_authenticate.php';
    require 'tchr_header.php';

    $sql="select st_name, st_univ_roll, st_passout_year, question.qstn_id as qstn_id, qstn_name, qstn_key, qstn_vector, res_result, res_key, res_iv, attempt_count from result, student, question where student.st_id=result.st_id and result.qstn_id=question.qstn_id and result.res_id=".$_GET['res_id'];
	$result=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($result);

	#start of file reading
	$fileResultName='../result/'.$_GET['res_id'];
	$fileQstnName='../questions/'.$row['qstn_id'];
	#Reads entire file into a string
	$fileResult=file_get_contents($fileResultName);
	$fileQstn=file_get_contents($fileQstnName);
	#Decryption
	$fileResult=openssl_decrypt($fileResult,"aes-128-cbc",$row['res_key'],true,$row['res_iv']);
	$fileQstn=openssl_decrypt($fileQstn,"aes-128-cbc",$row['qstn_key'],true,$row['qstn_vector']);
	#Decodes a JSON string
	$fileResult_json= json_decode($fileResult, true);
	$fileQstn_json= json_decode($fileQstn, true);


    echo "<div class='row' style='background: #212529;'>
        <div class='col-sm-12 d-flex justify-content-center'><h2 style='font-weight: bold; color: #ffffff; border: 2px solid #ffffff; padding: 5px; margin: 10px;'>".strtoupper($row['qstn_name'])."</h2></div>
        <div class='col-sm-12' style='color: #ffffff;'>NAME: ".$row['st_name']."</div>
        <div class='col-sm-12' style='color: #ffffff;'>UNIVERSITY ROLL: ".$row['st_univ_roll']."</div>
        <div class='col-sm-12' style='color: #ffffff;'>PASSOUT YEAR: ".$row['st_passout_year']."</div>
        <div class='col-sm-12' style='color: #ffffff;'>SCORE: ".$row['res_result']."</div>
        <div class='col-sm-12' style='color: #ffffff;'>ATTEMPT NO: ".$row['attempt_count']."</div>
    </div>";
	echo "<table class='table table-striped'>";
	echo "<thead class='thead-dark'>";
		echo "<tr>";
			echo "<th scope='col'>SL NO</th>";
			echo "<th scope='col'>QUESTION</th>";
			echo "<th scope='col'>CORRECT ANSWER</th>";
			echo "<th scope='col'>STUDENT'S ANSWER</th>";
		echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
		$i=1;
		foreach($fileQstn_json as $question) {
			if(strcmp($fileResult_json[$i]['orgAnswer'],$fileResult_json[$i]['usrAnswer'])!=0)
				$flag="style='background: #db0000;'";
			else
				$flag="";
			echo "<tr>";
				echo "<th scope='row'>".$i."</th>";
				echo "<td>".$question['question']."</td>";
				echo "<td>".$fileResult_json[$i]['orgAnswer']."</td>";
				echo "<td ".$flag.">".$fileResult_json[$i]['usrAnswer']."</td>";
			echo "</tr>";
			$i++;
		}
	echo "</tbody>";
    echo "</table>";
    

    require 'tchr_footer.php';
?>