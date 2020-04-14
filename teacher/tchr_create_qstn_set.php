<?php
	require 'tchr_authenticate.php';
	require 'tchr_header.php';
	require 'tchr_menu.php';
?>

<div class="row">

	<div class="col-sm-3" style="margin-left: 40px; margin-top: 20px; margin-right: 20px;"><!--start subject selection form-->
		<form enctype="multipart/form-data" action="tchr_create_qstn_set.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>" id="frmChooseSubject" method="post" style="max-height: 400px; overflow-y: scroll;">
			<?php
				$tchr_id=explode("_",$_GET['user']);
				$sql="select subject.subj_id as subj_id, subject.subj_name as subj_name from teacher, stream, subject, stream_subjects where teacher.strm_id=stream.strm_id and teacher.tchr_id=".$tchr_id[1]." and subject.subj_id=stream_subjects.subj_id and stream.strm_id=stream_subjects.strm_id";
				$result=mysqli_query($link,$sql);
				while($row=mysqli_fetch_assoc($result)) {
					echo '<div class="form-check">';
						echo '<input type="checkbox" class="form-check-input" name="'.$row['subj_name'].'" value="'.$row['subj_id'].'">';
						echo '<label class="form-check-label" for="'.$row['subj_name'].'">'.$row['subj_name'].'</label>';
					echo '</div><hr/>';
				}
			?>
		</form>
	</div><!--end subject selection form-->

	<div class="col-sm-1 d-flex justify-content-end align-self-center" style="margin-right: 20px; margin-top: 20px;">
		<button type="button" class="btn btn-primary" onclick="document.getElementById('frmChooseSubject').submit();">Next <i class="fas fa-arrow-circle-right"></i></button>
	</div>

	<div class="col-sm-7" style="margin-top: 20px; margin-right: 10px;"><!--start of form after subject choose-->
		<?php
			if(isset($_GET['status']) && ($_GET['status']==1)) {
				echo "<div class='row'>
					<div class='col-sm-12 text-center' style='font-weight: bold; background: #18b481; color: #ffffff; padding: 4px;'>Question set successfully generated....Check your home page</div>
				</div>";
			}


			if(!empty($_POST)) {
				echo '<form action="tchr_generate_qstn.php?user='.$_GET['user'].'&key='.$_GET['key'].'" id="frmQstnSet" method="post" style="padding-left: 20px; max-height: 450px; overflow-y: scroll; overflow-x: hidden;">';
					echo '<div class="form-group row">
						<label class="col-form-label col-sm-4">Question Set Name</label>
						<div class="input-group col-sm-5">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-file-signature"></i></div>
							</div>
							<input type="text" class="form-control" name="frmQstnName" placeholder="question set name" required />
						</div>
					</div>';
					echo '<div class="form-group row">
						<label class="col-form-label col-sm-4">Time (in Minutes)</label>
						<div class="input-group col-sm-4">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-clock"></i></div>
							</div>
							<input type="text" class="form-control" name="frmQstnTime" placeholder="time" required />
						</div>
					</div>';
					echo '<div class="form-group row">
					<label class="col-sm-8" style="font-weight: bold; border: 1px solid #000000;">Specify random number of questions for each subject</label>
					</div>';
					foreach($_POST as $key=>$val) {
						echo '<div class="form-group row">
							<label class="col-form-label col-sm-4">'.str_replace('_',' ',$key).'</label>
							<div class="input-group col-sm-4">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-clipboard-list"></i></div>
								</div>
								<input type="text" class="form-control" name="'.$val.'" placeholder="number" required />
							</div>
						</div>';
					}
				echo '</form>';
				echo '<div class="row"><div class="col-sm-9 d-flex justify-content-end">
						<button class="btn btn-success" onclick="document.getElementById(\'frmQstnSet\').submit();"><i class="fas fa-plus-square"></i> Generate Question Set</button>
				</div></div>';
			}
		?>
	</div><!--end of form after subject choose-->

</div>

<?php
	require 'tchr_footer.php';
?>