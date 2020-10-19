<?php
	require 'tchr_authenticate.php';

	###### retrive stream #########
	$t_user=explode('_',$_GET['user']);
	$sql="select teacher.strm_id as strm_id from teacher where teacher.strm_id=".$t_user[1];
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($result);
	############ end ##############


	$sql="select student.st_name as st_name, st_passout_year, result.res_result as res_result, result.res_id as res_id, exam_date from student, question, result where question.strm_id=".$row['strm_id']." and student.st_id=result.st_id and question.qstn_id=result.qstn_id and question.qstn_name like '%".$_GET['q']."%'";
	if(isset($_GET['e']) && $_GET['e']!='') {
		$sql.=" and result.exam_date='".$_GET['e']."'";
	}
	$sql.=" order by st_name, attempt_count";

	#Final $sql query is done
	$result=mysqli_query($link,$sql);
	if (mysqli_num_rows($result)==0)
		echo "<div class='row d-flex justify-content-center text-danger'><h4 style='font-weight: bold;'><i class='fas fa-exclamation-triangle'></i> No record found....</h4></div>";
	else {
		$i=0;
		echo "<table class='table table-striped'>";
		echo "<thead class='thead-dark'>";
			echo "<tr>";
				echo "<th scope='col'>SL NO</th>";
				echo "<th scope='col'>STUDENT NAME</th>";
				echo "<th scope='col'>SCORE</th>";
				#echo "<th scope='col'>ATTEMPT</th>";
				echo "<th scope='col'>EXAM DATE</th>";
				echo "<th scope='col'>PASSOUT YEAR</th>";
				echo "<th scope='col'>OPTION</th>";
			echo "</tr>";
		echo "</thead>";

		echo "<tbody>";
			while($row=mysqli_fetch_assoc($result)) {
				echo "<tr>";
					echo "<th scope='row'>".++$i."</th>";
					echo "<td>".$row['st_name']."</td>";
					echo "<td>".$row['res_result']."</td>";
					echo "<td>".$row['attempt_count']."</td>";
					echo "<td>".$row['exam_date']."</td>";
					echo "<td>".$row['st_passout_year']."</td>";
					echo "<td><button type='button' class='btn btn-primary' onclick='loadDetailResult(".$row['res_id'].")'><i class='fas fa-eye'></i> View</button></td>";
				echo "</tr>";
			}
		echo "</tbody>";
		echo "</table>";
	}
?>