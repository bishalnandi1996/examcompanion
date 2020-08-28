<?php
	require 'admin_authenticate.php';
	require 'admin_header.php';
?>


<script>
	var u = <?php echo json_encode($_GET['user']); ?>;
	var k = <?php echo json_encode($_GET['key']); ?>;

	function saveSubj() {
		var subj = document.getElementById('frmSubject').value;

		window.location='admin_save_subject.php?user='+u+'&key='+k+'&subj='+subj;
	}

    function assignSubjDept() {
		var subjID = document.getElementById('frmSubjID').value;
        var deptID = document.getElementById('frmStrmID').value;

		window.location='admin_subj_dept.php?user='+u+'&key='+k+'&subjID='+subjID+'&deptID='+deptID;
    }
    
    function loadDeptModal(subjID) {
		var xhttpSubjModal = new XMLHttpRequest();
		xhttpSubjModal.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				$("#deptModal .modal-body").html(this.responseText);
				$("#deptModal").modal();
			}
		};
		xhttpSubjModal.open("GET", "admin_load_dept_modal.php?user=" + u + "&key=" + k + "&subj=" + subjID, true);
		xhttpSubjModal.send();	
	}
</script>


<?php
    #require 'admin_menu.php';
    
    if(isset($_GET['save']) && ($_GET['save']==1)) {
        echo "<script>alert('New Subject Successfully Added');</script>";
    }

    if(isset($_GET['assign'])) {
        if($_GET['assign']==1) {
            echo "<script>alert('Subject Successfully Assigned to Stream')</script>";
        }
        if($_GET['assign']==0) {
            echo "<script>alert('Subject Already Assigned to Stream')</script>";
        }
    }
?>

<div class="row" style="margin-top: 5px; margin-right: 5px;">
    <div class="col-sm-12 d-flex justify-content-end">
    <button class="btn btn-info" data-toggle='modal' data-target='#assignSubjectModal'><i class="fas fa-chalkboard"></i> Assign Subject</button>&nbsp;
    <button class="btn btn-primary" data-toggle='modal' data-target='#myModal'><i class="fas fa-plus-circle"></i> New Subject</button>
    </div>
</div>


<div class="row" style="padding-left: 15px; padding-right: 15px;">
    <?php
        $sql="select * from subject";
        $result=mysqli_query($link,$sql);
        while($row=mysqli_fetch_assoc($result)) {
            echo "<div class='divSubjects' onclick='loadDeptModal(".$row['subj_id'].");' style=''><h1 style='color: #ffffff;'><i class='fas fa-book'></i></h1>".$row['subj_name']."</div>";
        }
    ?>
</div>


<!-- The Modal -->
<div class="modal" id="myModal">
<div class="modal-dialog">
	<div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header">
			<h4 class="modal-title">NEW SUBJECT</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<!-- Modal body -->
		<div class="modal-body">
			<div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-book"></i></div>
				</div>
				<input type="text" placeholder="stream" id="frmSubject" />
			</div>
		</div>
		<!-- Modal footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-success" onclick='saveSubj()'><i class="fas fa-save"></i> Save</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-power-off"></i> Close</button>
		</div>

	</div>
</div>
</div>


<!-- The Modal -->
<!-- Assign Subject -->
<div class="modal" id="assignSubjectModal">
<div class="modal-dialog">
	<div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header">
			<h4 class="modal-title">ASSIGN SUBJECT</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<!-- Modal body -->
		<div class="modal-body">
            <div class="form-group row">
            <label class="col-form-label">STREAM</label>
                <select class="form-control" id="frmStrmID" required>
                    <option value="">--Select--</option>
                    <?php
                        $sql_stream="select * from stream";
                        $result_stream=mysqli_query($link,$sql_stream);
                        while($row_stream=mysqli_fetch_assoc($result_stream)) {
                            echo "<option value='".$row_stream['strm_id']."'>".$row_stream['strm_name']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-group row">
            <label class="col-form-label">SUBJECT</label>
                <select class="form-control" id="frmSubjID" required>
                    <option value="">--Select--</option>
                    <?php
                        $sql_subject="select * from subject";
                        $result_subject=mysqli_query($link,$sql_subject);
                        while($row_subject=mysqli_fetch_assoc($result_subject)) {
                            echo "<option value='".$row_subject['subj_id']."'>".$row_subject['subj_name']."</option>";
                        }
                    ?>
                </select>
            </div>
		</div>
		<!-- Modal footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-success" onclick='assignSubjDept()'><i class="fas fa-share-square"></i> Assign</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-power-off"></i> Close</button>
		</div>

	</div>
</div>
</div>


<!-- Departments Modal -->
<!-- Dynamic Content -->
<div class="modal" id="deptModal">
<div class="modal-dialog">
	<div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header">
			<h4 class="modal-title">DEPARTMENTS</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<!-- Modal body -->
		<div class="modal-body">
		</div>

	</div>
</div>
</div>


<?php
	require 'admin_footer.php';
?>