<?php
	require 'admin_authenticate.php';
	require 'admin_header.php';
	require 'admin_menu.php';
?>


<div class="row">

	<div class="col-sm-5" style="background: #dedede; border: 3px solid #00003b; color: #00006f; margin: 20px; font-weight: bold;"><!--Instruction for file format-->
		<div class="row d-flex justify-content-center">
			<h3 style="text-decoration: underline;">INSTRUCTIONS FOR FILE UPLOAD</h3>
		</div>
		<div class="row">
			<ol>
				<li>Only .xlsx files are allowed to upload</li>
				<li>File should not contain any column headings, tables, graphs, charts etc.</li>
				<li>File should contain data in first two columns only</li>
				<li>For Teacher data the fisrt column should contain employee id and second column should contain the corresponding names</li>
				<li>For Student data the first column should contain university roll number and second column should contain the corresponding names</li>
				<li>Text should not contain styles like bold, italic, underline etc.</li>
			</ol>
		</div>
	</div><!--end of instruction-->

	<div class="col-sm-6"><!--File uploading form-->
		
		<fieldset><div class="row"><!--Teacher Data Upload-->

		<?php
			if(isset($_GET['type']) && strcmp($_GET['type'],'tchr')==0) {
				echo "<div class='row' style='margin-top: 20px; color: #ffffff;'><div class='col-sm-12 d-flex justify-content-center'><h6 class='bg-success' style='padding: 4px;'>Teacher Data Upload was Successfull</h6></div></div>";
			}
		?>

			<div class="d-sm-flex justify-content-center" style="margin-top: 20px;"><!--flex to center align the form-->
				<div class="card col-sm-12" style="padding: 0;"><!--bootstrap4 card-->
					<div class="card-heading bg-info text-white text-center col-sm-12" style="padding: 5px; font-weight: bold;"><i class="fas fa-chalkboard-teacher"></i> UPLOAD TEACHER DATA</div>
					<div class="card-body">
						<form enctype="multipart/form-data" action="admin_upload_process.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>&type=tchr" method="post">
							<div class="form-group">
								<label class="col-form-label col-sm-12" style="font-weight: bold;">SELECT xlsx FILE</label>
								<div class="input-group col-sm-12">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-file-excel"></i></div>
									</div>
									<input type="file" class="form-control" name="frmDataFile" required accept=".xlsx" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12 d-flex justify-content-end">
									<button type="submit" class="btn btn-success"><i class="fas fa-file-upload"></i> UPLOAD</button>
								</div>
							</div>
						</form>
					</div>
				</div><!--end of bootstrap4 card-->
			</div><!--end of flex to center align form-->
		</div></fieldset><!--end of teacher form-->
	
		
		<fieldset><div class="row"><!--Student Data Upload-->

		<?php
			if(isset($_GET['type']) && strcmp($_GET['type'],'std')==0) {
				echo "<div class='row' style='margin-top: 20px; color: #ffffff;'><div class='col-sm-12 d-flex justify-content-center'><h6 class='bg-success' style='padding: 4px;'>Student Data Upload was Successfull</h4></div></div>";
			}
		?>

			<div class="d-sm-flex justify-content-center" style="margin-top: 20px;"><!--flex to center align the form-->
				<div class="card col-sm-12" style="padding: 0;"><!--bootstrap4 card-->
					<div class="card-heading bg-info text-white text-center col-sm-12" style="padding: 5px; font-weight: bold;"><i class="fas fa-user-graduate"></i> UPLOAD STUDENT DATA</div>
					<div class="card-body">
						<form enctype="multipart/form-data" action="admin_upload_process.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>&type=std" method="post">
							<div class="form-group">
								<label class="col-form-label col-sm-12" style="font-weight: bold;">SELECT xlsx FILE</label>
								<div class="input-group col-sm-12">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-file-excel"></i></div>
									</div>
									<input type="file" class="form-control" name="frmDataFile" required accept=".xlsx" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12 d-flex justify-content-end">
									<button type="submit" class="btn btn-success"><i class="fas fa-file-upload"></i> UPLOAD</button>
								</div>
							</div>
						</form>
					</div>
				</div><!--end of bootstrap4 card-->
			</div><!--end of flex to center align form-->
		</div></fieldset><!--end of student form-->

	</div><!--end of uploading form-->

</div>








<?php
	require 'admin_footer.php';
?>