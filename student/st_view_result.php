<?php
	require 'st_authenticate.php';
	require 'st_header.php';
?>

<script>
	var js_user = <?php echo json_encode($_GET['user']); ?>;
	var js_key = <?php echo json_encode($_GET['key']); ?>;

	function loadDetailResult(js_res_id) {
		window.open('st_qstn_ans.php?user='+js_user+'&key='+js_key+'&res_id='+js_res_id);
	}
</script>

<?php
	$student=explode('_',$_GET['user']);
	$sql="select res_id, qstn_name, res_result, exam_date, attempt_count from student, question, result where student.st_id=result.st_id and question.qstn_id=result.qstn_id and student.st_id=".$student[1]." order by qstn_name";
	$result=mysqli_query($link,$sql);

	if(mysqli_num_rows($result)==0) {
		echo "<div class='row'>";
		echo "<div class='col-sm-12 text-danger' style='font-weight: bold;'>You Have Not Given any Exam</div>";
		echo "</div>";
	}
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
				echo "<th scope='col'>VIEW RESULT</th>";
				#echo "<th scope='col'>DOWNLOAD</th>";
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
					echo "<td><button type='button' class='btn btn-primary' onclick='loadDetailResult(".$row['res_id'].")'><i class='fas fa-eye'></i> Show Answer</button></td>";
					#echo "<td><button type='button' class='btn btn-dark' onclick='downloadDetailResult(".$row['res_id'].")'><i class='fas fa-file-download'></i> Download</button></td>";
				echo "</tr>";
			}
		echo "</tbody>";
		echo "</table>";
	}

	echo "<div id='result_download'></div>";
	require 'st_footer.php';
?>