<?php
	require 'admin_header.php';

	if(isset($_GET['login']) && $_GET['login']==0) {
		echo "<div class='row d-flex justify-content-center text-danger'><h5 style='font-weight: bold; margin-top: 20px;'><i class='fas fa-exclamation-triangle'></i> Invalid Login Credentials</h5></div>";
	}
?>

<fieldset>
<div class="d-sm-flex justify-content-center" style="margin-top: 20px;"><!--flex to center align the form-->
	<div class="card col-sm-4" style="padding: 0;"><!--bootstrap4 card-->

		<div class="card-heading bg-dark text-white text-center col-sm-12" style="padding: 5px; font-weight: bold;">ADMIN LOGIN</div>

		<div class="card-body">
			<form action="admin_signin.php" method="post">
				<div class="form-group row">
					<label class="col-label-form col-sm-4">USER NAME </label>
					<div class="col-sm-7">
						<input type="email" class="form-control" name="frmSigninUser" placeholder="user name" required />
					</div>
				</div>
				<div class="form-group row">
					<label class="col-form-label col-sm-4">PASSWORD </label>
					<div class="col-sm-7">
						<input type="password" class="form-control" name="frmSigninPassword" placeholder="password" required />
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-11 d-flex justify-content-end">
						<button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Signin</button>
					</div>
				</div>
			</form>
		</div>

	</div><!--end of bootstrap4 card-->
</div><!--end of flex to center align form-->
</fieldset>


<?php
	require 'admin_footer.php';
?>