<?php
	require 'tchr_authenticate.php';
	require 'tchr_header.php';
	require 'tchr_menu.php';

	if(isset($_GET['status']) && $_GET['status']==1) {
		echo "<div class='row'><div class='col-sm-12 d-flex justify-content-center'><h4 class='text-success'>Question Upload was Successfull</h4></div></div>";
	}
?>

<div class="row">


	<div class="col-sm-5" style="background: #00eed4; border: 3px solid #0a9b69; border-radius: 10px; color: #0a9b69; margin: 20px; font-weight: bold;"><!--start of file format instruction-->
		<div class="row d-flex justify-content-center">
			<h3 style="text-decoration: underline;">INSTRUCTIONS FOR FILE UPLOAD</h3>
		</div>
		<div class="row">
			<ol>
				<li>Only .xlsx files are allowed to upload</li>
				<li>File should not contain any tables, graphs, charts etc.</li>
				<li>File should contain data in first seven columns only</li>
				<li>1st column is for serial number</li>
				<li>2nd column is for question</li>
				<li>3rd column is for option A</li>
				<li>4th column is for option B</li>
				<li>5th column is for option C</li>
				<li>6th column is for option D</li>
				<li>7th column is for correct option i.e. A or B or C or D</li>
				<li>First row should contain the corresponding headings only</li>
			</ol>
		</div>
	</div><!--end of file format instruction-->


	<div class="col-sm-6"><!--start question upload form-->
		<div class='row'>
			<div class='col-sm-12 d-flex justify-content-center'>

				<form enctype="multipart/form-data" action="tchr_upload_process.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>" method="post" style='border: 1px solid #000000; padding: 20px; margin-top: 10px'>
					<div class="form-group row">
						<label class="col-form-label col-sm-4">SUBJECT</label>
						<div class="input-group col-sm-6">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-book"></i></div>
							</div>
							<select class="form-control" name="frmQstnSubject" required>
								<option value=''>--Select--</option>
								<?php
									$tchr_id=explode("_",$_GET['user']);
									$sql="select subject.subj_id as subj_id, subject.subj_name as subj_name from teacher, stream, subject, stream_subjects where teacher.strm_id=stream.strm_id and teacher.tchr_id=".$tchr_id[1]." and subject.subj_id=stream_subjects.subj_id and stream.strm_id=stream_subjects.strm_id";
									$result=mysqli_query($link,$sql);
									while($row=mysqli_fetch_assoc($result)) {
										echo "<option value='".$row['subj_id']."'>".$row['subj_name']."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-4">SELECT xlsx FILE</label>
						<div class="input-group col-sm-7">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-file-excel"></i></div>
							</div>
							<input type="file" class="form-control" id="frmQstnFile" name="frmQstnFile" required accept=".xlsx" />
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-11 d-flex justify-content-end">
							<button type="submit" class="btn btn-success"><i class="fas fa-file-upload"></i> UPLOAD</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div><!--end of question upload form-->


</div>


<?php
	require 'tchr_footer.php';
?>