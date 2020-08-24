<?php
	require 'header.php';
?>

<div class="row" style="border: 1px solid #000000; padding: 30px;">
	<div class="col-sm-12 text-center user-role" onclick="window.location='std_login_form.php';" style="background: #fafbbd;">STUDENT</div>
	<div class="col-sm-12 text-center user-role" onclick="window.location='tchr_login_form.php';" style="background: #ddffdd; margin-top: 30px;">TEACHER</div>
	<div class="col-sm-12 text-center user-role" onclick="window.location='admin/';" style="background: #AAAAff; margin-top: 30px;">ADMIN</div>
</div>

<?php
	require 'footer.php';
?>