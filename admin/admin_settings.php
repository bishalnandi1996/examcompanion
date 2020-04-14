<?php
    require 'admin_authenticate.php';
	require 'admin_header.php';
    require 'admin_menu.php';
?>

<div class="d-flex justify-content-center" style="margin-top: 20px;">
	<div class="card">
		<div class="card-header bg-light" style="font-weight: bold;">CHANGE PASSWORD</div>

		<?php
			#password changin message
			if(isset($_GET['pass']) && $_GET['pass']==1)
				echo '<div class="bg-success d-flex justify-content-center" style="color: #ffffff; font-weight: bold;">Password changed successfully</div>';
				if(isset($_GET['pass']) && $_GET['pass']==0)
			echo '<div class="bg-danger d-flex justify-content-center" style="color: #ffffff; font-weight: bold;">Current password is wrong</div>';
		?>

		<div class="card-body">
			<form action="admin_chng_pass.php?user=<?php echo $_GET['user']; ?>&key=<?php echo $_GET['key']; ?>" method="post">
				<div class="form-group row">
					<label class="col-label-form col-sm-5">Current Password</label>
					<div class="col-sm-7">
						<input type="password" class="form-control" name="frm_current_pass" placeholder="current password" required/>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-label col-sm-5">New Password</label>
					<div class="col-sm-7">
						<input type="password" class="form-control" name="frm_new_pass" placeholder="new password" required />
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-12 d-flex justify-content-end">
						<button type="submit" class='btn btn-success'><i class="fas fa-edit"></i> Update</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<?php
    require 'admin_footer.php';
?>