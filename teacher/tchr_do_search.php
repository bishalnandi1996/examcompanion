<?php
	require 'tchr_authenticate.php';

	###### retrive stream #########
	$t_user=explode('_',$_GET['user']);
	$sql="select teacher.strm_id as strm_id from teacher where teacher.strm_id=".$t_user[1];
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_assoc($result);
	############ end ##############

	$sql="select distinct student.st_id as st_id, st_name, st_univ_roll, st_passout_year from  student, result  where student.st_signup=1 and student.strm_id=".$row['strm_id']." and student.st_id=result.st_id";
	if(isset($_GET['n']) && $_GET['n']!='') {
		$sql.=" and student.st_name like '%".$_GET['n']."%'";
	}
	if(isset($_GET['r']) && $_GET['r']!='') {
		$sql.=" and cast(student.st_univ_roll as varchar(100)) like '%".$_GET['r']."%'";
	}
	if(isset($_GET['e']) && $_GET['e']!='') {
		$sql.=" and result.exam_date='".$_GET['e']."'";
	}
	if(isset($_GET['p']) && $_GET['p']!='') {
		$sql.=" and student.st_passout_year=".$_GET['p'];
	}

	#Final $sql query is done
	$result=mysqli_query($link,$sql);
	if (mysqli_num_rows($result)==0)
		echo "<div class='row d-flex justify-content-center text-danger'><h4 style='font-weight: bold;'><i class='fas fa-exclamation-triangle'></i> No record found....</h4></div>";
	else {
		while($row=mysqli_fetch_assoc($result)) {
			echo "<div class='row d-flex justify-content-center' style='border: 2px solid #000000; margin-top: 20px; padding: 20px; font-weight: bold;'>";
			echo "<div class='col-sm-6'>";
				echo "<div class='row'>";
				echo "<div class='col-sm-12'>".$row['st_name']."</div>";
				echo "<div class='col-sm-4'>Batch: ".$row['st_passout_year']." passout</div>";
				echo "<div class='col-sm-6'>University Roll: ".$row['st_univ_roll']."</div>";
				echo "</div>";
			echo "</div>";
			echo "<div class='col-sm-2'>";
				echo "<div class='row'>";
				echo "<div class='col-sm-12'><button type='button' class='btn btn-primary' onclick='loadStdResult(".$row['st_id'].")' ><i class='fas fa-eye'></i> VIEW RESULT</button></div>";
				echo "</div>";
			echo "</div>";
			echo "</div>";
		}
	}
?>