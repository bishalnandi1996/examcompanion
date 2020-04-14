<?php
    require 'admin_authenticate.php';
?>

<div class="row">

	<div class="card bg-danger text-white col-sm-2"><!--question set-->
		<div class="card-body text-center">
			<?php
				$sql="select * from teacher";
				$result=mysqli_query($link,$sql);
				$num=mysqli_num_rows($result);
				echo "<h1><i class='fas fa-clipboard-list'></i> ".$num."</h1>";
			?>
			<sub>UPLOADED QUESTION SET</sub>
		</div>
	</div>

	<div class="card bg-warning text-white col-sm-2"><!--department-->
		<div class="card-body text-center">
			<?php
				$sql="select * from stream";
				$result=mysqli_query($link,$sql);
				$num=mysqli_num_rows($result);
				echo "<h1><i class='fas fa-university'></i> ".$num."</h1>";
			?>
			<sub>REGISTERTED DEPARTMENTS</sub>			
		</div>
	</div>

	<div class="card bg-primary text-white col-sm-2"><!--teachers signin-->
		<div class="card-body text-center">
			<?php
				$sql="select * from teacher where tchr_signup=1";
				$result=mysqli_query($link,$sql);
				$num=mysqli_num_rows($result);
				echo "<h1><i class='fas fa-chalkboard-teacher'></i> ".$num."</h1>";
			?>
			<sub>NUMBER OF TEACHERS ACCOUNT</sub>			
		</div>
	</div>

	<div class="card bg-success text-white col-sm-2"><!--students signin-->
		<div class="card-body text-center">
			<?php
				$sql="select * from student where st_signup=1";
				$result=mysqli_query($link,$sql);
				$num=mysqli_num_rows($result);
				echo "<h1><i class='fas fa-user-graduate'></i> ".$num."</h1>";
			?>
			<sub>NUMBER OF STUDENTS ACCOUNT</sub>			
		</div>
	</div>

	<div class="card bg-dark text-white col-sm-2"><!--sessions-->
		<div class="card-body text-center">
			<?php
				$sql="select * from session";
				$result=mysqli_query($link,$sql);
				$num=mysqli_num_rows($result);
				echo "<h1><i class='fas fa-user-secret'></i> ".$num."</h1>";
			?>
			<sub>TOTAL ACTIVE SESSIONS</sub>			
		</div>
	</div>

</div>