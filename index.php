<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<!--Bootstrap 4-->
	<link rel="stylesheet" type="text/css" href="bootstrap-4/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="fontawesome-5/css/all.css" />
	<script src="jquery-3.2.1.min.js"></script>
	<script src="bootstrap-4/js/bootstrap.min.js"></script>

	<script>
		function checkStd(std) {
			if(isNaN(std))
				document.getElementById("stSignupMessage").innerHTML = "<i class='fas fa-exclamation-triangle'></i> Roll number can not contain characters";
			else {
				var xhttp_std = new XMLHttpRequest();
				xhttp_std.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var flag = this.responseText;
						if(flag == 0) {
							document.getElementById("stSignupMessage").innerHTML = "<i class='fas fa-exclamation-triangle'></i> Student record not available";
							document.getElementById("stdSignup").disabled = true;
						}
						if(flag == 1) {
							document.getElementById("stSignupMessage").innerHTML = "<i class='fas fa-exclamation-triangle'></i> Account already created";
							document.getElementById("stdSignup").disabled = true;
						}
						if(flag == 2){
							document.getElementById("stSignupMessage").innerHTML = "";
							document.getElementById("stdSignup").disabled = false;
						}
					}
				};
				xhttp_std.open("GET", "student/st_checkStd.php?roll="+std, true);
				xhttp_std.send();
			}
		}


		function checkTchr(tchr) {
			var xhttp_tchr = new XMLHttpRequest();
			xhttp_tchr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var flag = this.responseText;
					if(flag == 0) {
						document.getElementById("tchrSignupMessage").innerHTML = "<i class='fas fa-exclamation-triangle'></i> Teacher record not available";
						document.getElementById("tchrSignup").disabled = true;
					}
					if(flag == 1) {
						document.getElementById("tchrSignupMessage").innerHTML = "<i class='fas fa-exclamation-triangle'></i> Account already created";
						document.getElementById("tchrSignup").disabled = true;
					}
					if(flag == 2){
						document.getElementById("tchrSignupMessage").innerHTML = "";
						document.getElementById("tchrSignup").disabled = false;
					}
				}
			};
			xhttp_tchr.open("GET", "teacher/tchr_checkTeacher.php?emp="+tchr, true);
			xhttp_tchr.send();
		}
	</script>
	
	<style>
		.container-fluid {
			margin-left: auto;
			margin-right: auto;
			padding-left: 0;
			padding-right: 0;
		}

		.col-form-label {
			font-weight: bold;
		}
	</style>

</head>
<body style="overflow-x: hidden;">


<div class="container">

	<div class="row" style="margin: 50px; border: 5px double #000000;"><!--heading-->
		<div class="col-sm-12 d-flex justify-content-center"><h2 style="font-weight: bold; color: #000c72;">EXAM COMPANION</h2></div>
		<div class="col-sm-12 d-flex justify-content-center"><h5 style="font-weight: bold; color: #000c72;">Digitalized Examination System for Siliguri Institute of Technology</h5></div>
	</div><!--end heading-->


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

	<div class="row"><!--teacher form-->
		<div class="col-sm-12 d-flex justify-content-center" style="margin: 20px;"><h4 style="border: 3px double #000000; color: #000c72; padding: 4px; font-weight: bold;">TEACHER ZONE</h4></div>
		
		<div class="col-sm-6"><!--teacher signup form-->

			<div class="col-sm-11 d-flex justify-content-center" style="background: #8f62e3; color: #ffffff; font-weight: bold; padding: 5px; margin-bottom: 20px;">Don't have an account... Register here</div>
			<?php
				if(isset($_GET['t_signup']) && $_GET['t_signup']==1) {
					echo '<div class="col-sm-11 d-flex justify-content-center" style="background: #008d47; color: #ffffff; font-weight: bold; padding: 5px; margin-bottom: 20px;">Your account is created successfully</div>';
				}
			?>
			
			<form action="teacher/tchr_signup.php" method="post">
				<div class="form-group row">
					<label class="col-form-label col-sm-4">NAME </label>
					<div class="input-group col-sm-7">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fas fa-chalkboard-teacher"></i></div>
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
					<label class="col-form-label col-sm-4">EMPLOYEE ID </label>
					<div class="input-group col-sm-7">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fas fa-id-card-alt"></i></div>
						</div>
						<input type="text" class="form-control" name="frmSignupEmployeeId" onblur="checkTchr(this.value)" placeholder="employee id" required />
					</div>
					<div class="col-sm-11 text-danger d-flex justify-content-end" style="font-weight: bold;">	
						<div id="tchrSignupMessage"></div>
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
						<button type="submit" class="btn btn-success" id="tchrSignup" disabled><i class="fas fa-user-plus"></i> Signup</button>
					</div>
				</div>
			</form>

		</div>

		<div class="col-sm-6"><!--teacher signin form-->
		<div id="teacherlogin"><!--start #teacherlogin-->
			<?php
				if(isset($_GET['t_user']) && $_GET['t_user']==0) {
					echo "<div class='col-sm-12 d-flex justify-content-center bg-danger'><h6 style='font-weight: bold; color: #ffffff; margin-top: 5px; margin-bottom: 0px;'><i class='fas fa-exclamation-triangle'></i> Invalid User</h6></div>";
				}
				if(isset($_GET['t_login']) && $_GET['t_login']==0) {
					echo "<div class='col-sm-12 d-flex justify-content-center bg-danger'><h6 style='font-weight: bold; color: #ffffff; margin-top: 5px; margin-bottom: 0px;'><i class='fas fa-exclamation-triangle'></i> Wrong Password</h6></div>";
				}
			?>
			<div class="card col-sm-12" style="padding: 0;"><!--bootstrap4 card-->
				<div class="card-heading bg-secondary text-white text-center col-sm-12" style="padding: 5px; font-weight: bold;">TEACHER LOGIN</div>
				<div class="card-body">
					<form action="teacher/tchr_signin.php" method="post">
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
								<button type="button" class="btn btn-danger" data-toggle='modal' data-target='#tchrPassModal'><i class="fas fa-unlock-alt"></i> Forgot Password</button>
							</div>
							<div class="col-sm-5 d-flex justify-content-end">
								<button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Signin</button>
							</div>
						</div>
					</form>
				</div><!--end card body-->
			</div><!--end bootstrap card-->
		</div><!--end #teacherlogin-->
		</div>
	</div><!--end teacher form-->


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

<!-- Teacher Password Modal -->
<form action="teacher/tchr_forgot_password.php" method="post">
	<div class="modal" id="tchrPassModal">
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
					<label class="col-form-label col-sm-5">EMPLOYEE ID</label>
					<div class="input-group col-sm-7">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fas fa-id-card-alt"></i></div>
						</div>
						<input type="text" class="form-control" name="frmEmpId" placeholder="employee id" required />
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
<!--end of teacher password modal-->



</div><!--container-fluid-->


<footer class="footer" style="position: relative; width: 100%; bottom: 0; background: #ffffff; margin-top: 10px;">
	<div class="row" style=" border-top: 1px solid #000000; padding: 20px; font-size: 20px;">
		<div class="col-sm-7" style="margin: 10px;">
			&copy; <?php echo date("Y"); ?> Siliguri Institute of Technology. All Rights Reserved
		</div>
		<div class="col-sm-4" style="margin: 10px; cursor: pointer;" onclick="window.open('https://www.instagram.com/bishalnandi1996')">
			Developed and Maintained by <i class="fab fa-instagram"></i> <b>BISHAL</b>
		</div>
	</div>
</footer>

</body>
</html>
