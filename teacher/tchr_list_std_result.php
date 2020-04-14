<?php
	require 'tchr_authenticate.php';

	$sql="select res_id, qstn_name, exam_date, res_result, attempt_count from result, question where result.qstn_id=question.qstn_id and result.st_id=".$_GET['st_id']." order by exam_date, attempt_count";
	$result=mysqli_query($link,$sql);
	if (mysqli_num_rows($result)==0)
		echo "<div class='row d-flex justify-content-center text-danger'><h4 style='font-weight: bold;'><i class='fas fa-exclamation-triangle'></i> No record found....</h4></div>";
	else {
		$i=0;
		echo "<table class='table table-striped'>";
		echo "<thead class='thead-dark'>";
			echo "<tr>";
				echo "<th scope='col'>SL NO</th>";
				echo "<th scope='col'>QUESTION NAME</th>";
				echo "<th scope='col'>SCORE</th>";
				echo "<th scope='col'>EXAM DATE</th>";
				echo "<th scope='col'>ATTEMPT</th>";
				echo "<th scope='col'>OPTION</th>";
			echo "</tr>";
		echo "</thead>";

		echo "<tbody>";
			while($row=mysqli_fetch_assoc($result)) {
				echo "<tr>";
					echo "<th scope='row'>".++$i."</th>";
					echo "<td>".$row['qstn_name']."</td>";
					echo "<td>".$row['res_result']."%</td>";
					echo "<td>".$row['exam_date']."</td>";
					echo "<td>".$row['attempt_count']."</td>";
					echo "<td><button type='button' class='btn btn-primary' onclick='loadDetailResult(".$row['res_id'].")'><i class='fas fa-eye'></i> View</button></td>";
				echo "</tr>";
			}
		echo "</tbody>";
		echo "</table>";
	}
?>