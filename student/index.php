<?php
	require 'st_authenticate.php';
	require 'st_header.php';
?>
<script>
	function startTest(x) {
		window.open('examFiles/index.php?user='+<?php echo json_encode($_GET['user']) ?>+'&key='+<?php echo json_encode($_GET['key']) ?>+'&qstn='+x,'_self');			
	}
</script>
<?php
	require 'st_menu.php';
?>

<div class="row">
	<div class="col-sm-5" style="background: #dedede; border: 3px solid #00003b; color: #00006f; margin: 20px; font-weight: bold;" ><!--instructions-->
		<div class="row d-flex justify-content-center">
			<h3 style="text-decoration: underline;">INSTRUCTIONS</h3>
		</div>
		<div class="row">
			<ol>
				<li>If you are not able to see your preferred question set then contact your teacher and ask them to open the question set for your passout batch.</li>
				<li>Click on the Start Test button for appearing the exam.</li>
				<li>Do not switch to other tabs or windows once you started the exam. Doing the same will make your exam end and the page will be auto submitted.</li>
				<li>Before starting the test we recomend you to disable all system notifications and popup.</li>
				<li>Once you start the test a timer will show you the remaining time. You can not pause and resume the exam.</li>
				<li>Make sure you have clicked the submit button after appearing the exam (if you finished before time) otherwise your response will not be recorded.</li>
				<li>Once the time is finished the answer will be auto submitted.</li>
				<li>For any other query contact your exam invigilator.</li>
			</ol>
		</div>
	</div><!--end instruction-->
	<div class="col-sm-6"><!--question sets-->
		<?php
			$st_year=explode('_',$_GET['user']);
			$sql="select question.qstn_name as qstn_name, question_assign.qstn_id as qstn_id from question, student, question_assign where student.st_id=".$st_year[1]." and student.st_passout_year=question_assign.st_passout_year and question.qstn_id=question_assign.qstn_id and student.strm_id=question.strm_id";
			$result=mysqli_query($link,$sql);
			if(mysqli_num_rows($result)==0) {
				echo "<div class='row'>";
				echo "<div class='col-sm-12 text-danger' style='font-weight: bold;'>Hurrah!!!  No Question Set... No Exam</div>";
				echo "</div>";
			}
			else {
				while ($row=mysqli_fetch_assoc($result)) {
					echo "<div class='row' style='margin: 5px;'>";
					echo "<div class='col-sm-9' style='background: #8362be; padding-top: 5px; color: #ffffff; font-size: 20px;'><i class='fas fa-clipboard-list'></i> ".$row['qstn_name']."</div>";
					$sql_attempt="select * from result where result.qstn_id=".$row['qstn_id']." and result.st_id=".$st_year[1];
					$result_attempt=mysqli_query($link,$sql_attempt);
					$attempt_flag=mysqli_num_rows($result_attempt);
					if($attempt_flag==0) {
						echo "<div class='col-sm-3' style='padding: 2px;'><button type='button' style='border-radius: 0px;' class='btn btn-success' onclick='startTest(".$row['qstn_id'].")' ><i class='fas fa-play-circle'></i> Start Test</button></div>";
					}
					echo "</div>";
				}
			}
		?>
	</div><!--end question sets-->
</div>

<?php
	require 'st_footer.php';
?>