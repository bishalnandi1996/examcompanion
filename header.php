<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>examcompanion</title>
	<!--Bootstrap 4-->
	<link rel="stylesheet" type="text/css" href="bootstrap-4/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="fontawesome-5/css/all.css" />
	<script src="jquery-3.2.1.min.js"></script>
	<script src="bootstrap-4/js/bootstrap.min.js"></script>

	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="style.css" />

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

</head>
<body style="overflow-x: hidden;">


<div class="container">

	<div class="row" style="margin-top: 20px; margin-left: 50px; margin-right: 50px; border: 5px double #000000;"><!--heading-->
		<div class="col-sm-12 d-flex justify-content-center text-center"><h2 style="font-weight: bold; color: #000c72;">EXAM COMPANION</h2></div>
		<div class="col-sm-12 d-flex justify-content-center text-center"><h5 style="font-weight: bold; color: #000c72;">Digitalized Examination System</h5></div>
	</div><!--end heading-->

	<hr/><hr/>