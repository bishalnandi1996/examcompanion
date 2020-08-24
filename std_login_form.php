<?php
    require 'header.php';
?>

<div class="row"><!--student form-->

	<div class="col-sm-12 d-flex justify-content-center" style="margin: 20px;"><h4 style="border: 3px double #000000; color: #000c72; padding: 4px; font-weight: bold;">STUDENT ZONE</h4></div>

	<div class="col-sm-6"><!--student signup form-->

		<div class="col-sm-11 d-flex justify-content-center" style="background: #8f62e3; color: #ffffff; font-weight: bold; padding: 5px; margin-bottom: 20px;">Don't have an account... Register here</div>
		<?php
			if(isset($_GET['s_signup']) && $_GET['s_signup']==1) {
				echo '<div class="col-sm-11 d-flex justify-content-center" style="background: #008d47; color: #ffffff; font-weight: bold; padding: 5px; margin-bottom: 20px;">Your account is created successfully</div>';
			}
		?>
			
		<form action="student/st_signup.php" method="post">
			<div class="form-group row">
				<label class="col-form-label col-sm-4">NAME </label>
				<div class="input-group col-sm-7">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-user-graduate"></i></div>
					</div>
					<input type="text" class="form-control" name="frmSignupName" placeholder="name" required />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-sm-4">STREAM </label>
				<div class="input-group col-sm-7">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-filter"></i></div>
					</div>
					<select class="form-control" name="frmSignupStrm" required>
						<option value="">--Select--</option>
						<?php
							require 'linkDB.php';
							$sql="select * from stream";
							$result=mysqli_query($link,$sql);
							while($row=mysqli_fetch_assoc($result)) {
								echo "<option value='".$row['strm_id']."'>".$row['strm_name']."</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-sm-4">UNIVERSITY ROLL </label>
				<div class="input-group col-sm-7">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-university"></i></div>
					</div>
					<input type="text" class="form-control" name="frmSignupUnivRoll" onblur="checkStd(this.value)" placeholder="university roll" required />
				</div>
				<div class="col-sm-11 text-danger d-flex justify-content-end" style="font-weight: bold;">	
					<div id="stSignupMessage"></div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-sm-4">PASSOUT YEAR </label>
				<div class="input-group col-sm-7">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
					</div>
					<input type="text" class="form-control" pattern="[0-9]{4}" name="frmPassoutYear" placeholder="passout year" required />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-sm-4">PHONE NO </label>
				<div class="input-group col-sm-7">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
					</div>
					<input type="text" class="form-control" pattern="[0-9]{10}" name="frmSignupPh" placeholder="mobile number" required />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-sm-4">EMAIL </label>
				<div class="input-group col-sm-7">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-envelope"></i></div>
					</div>
					<input type="email" class="form-control" name="frmSignupEmail" placeholder="someone@example.com" required />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-sm-4">PASSWORD </label>
				<div class="input-group col-sm-7">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-key"></i></div>
					</div>
					<input type="password" class="form-control" name="frmSignupPassword" placeholder="password" required />
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-11 d-flex justify-content-end">
					<button type="submit" class="btn btn-success" id="stdSignup" disabled><i class="fas fa-user-plus"></i> Signup</button>
				</div>
			</div>
		</form>

	</div>

	<div class="col-sm-6"><!--student signin form-->
	<div id="studentlogin"><!--start #studentlogin-->
		<?php
			if(isset($_GET['s_user']) && $_GET['s_user']==0) {
				echo "<div class='col-sm-12 d-flex justify-content-center bg-danger'><h6 style='font-weight: bold; color: #ffffff; margin-top: 5px; margin-bottom: 0px;'><i class='fas fa-exclamation-triangle'></i> Invalid User</h6></div>";
			}
			if(isset($_GET['s_login']) && $_GET['s_login']==0) {
				echo "<div class='col-sm-12 d-flex justify-content-center bg-danger'><h6 style='font-weight: bold; color: #ffffff; margin-top: 5px; margin-bottom: 0px;'><i class='fas fa-exclamation-triangle'></i> Wrong Password</h6></div>";
			}
		?>
		<div class="card col-sm-12" style="padding: 0;"><!--bootstrap4 card-->
			<div class="card-heading bg-secondary text-white text-center col-sm-12" style="padding: 5px; font-weight: bold;">STUDENT LOGIN</div>
			<div class="card-body">
				<form action="student/st_signin.php" method="post">
					<div class="form-group row">
						<label class="col-form-label col-sm-3">EMAIL </label>
						<div class="input-group col-sm-7">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-envelope"></i></div>
							</div>
							<input type="email" class="form-control" name="frmSigninEmail" placeholder="someone@example.com" required />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-form-label col-sm-3">PASSWORD </label>
						<div class="input-group col-sm-7">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-key"></i></div>
							</div>
							<input type="password" class="form-control" name="frmSigninPassword" placeholder="password" required />
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-5">
							<button type="button" class="btn btn-danger" data-toggle='modal' data-target='#stPassModal'><i class="fas fa-unlock-alt"></i> Forgot Password</button>
						</div>
						<div class="col-sm-5 d-flex justify-content-end">
							<button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Signin</button>
						</div>
					</div>
				</form>
			</div><!--end card body-->
		</div><!--end bootstrap card-->
	</div><!--end #studentlogin-->
	</div>

</div><!--end student form-->


<!-- Student Password Modal -->
<form action="student/st_forgot_password.php" method="post">
	<div class="modal" id="stPassModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">CHANGE PASSWORD</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body">			
				<div class="form-group row">
					<label class="col-form-label col-sm-5">UNIVERSITY ROLL</label>
					<div class="input-group col-sm-7">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fas fa-user-graduate"></i></div>
						</div>
						<input type="text" class="form-control" name="frmUnivRoll" placeholder="university roll" required />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-form-label col-sm-5">NEW PASSWORD</label>
					<div class="input-group col-sm-7">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fas fa-key"></i></div>
						</div>
						<input type="password" class="form-control" name="frmNewPass" placeholder="new password" required />
					</div>
				</div>			
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-power-off"></i> Close</button>
				<button type="submit" class="btn btn-success" ><i class="fas fa-paper-plane"></i> Submit</button>
			</div>

		</div>
	</div>
	</div>
</form>
<!--end of student password modal-->

<?php
    require 'footer.php';
?>