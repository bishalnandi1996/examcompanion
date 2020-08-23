<?php
	require 'admin_authenticate.php';
    require 'admin_header.php';
?>


<script>
	var u = <?php echo json_encode($_GET['user']); ?>;
	var k = <?php echo json_encode($_GET['key']); ?>;

	function saveDept() {
		var dept = document.getElementById('frmStream').value;

		window.location='admin_save_dept.php?user='+u+'&key='+k+'&dept='+dept;
	}
</script>


<?php
    require 'admin_menu.php';
    
    if(isset($_GET['save']) && ($_GET['save']==1)) {
        echo "<script>alert('New Stream Successfully Added');</script>";
    }
?>

<div class="row" style="margin-top: 5px; margin-right: 5px;">
    <div class="col-sm-12 d-flex justify-content-end">
        <button class="btn btn-primary" data-toggle='modal' data-target='#myModal'><i class="fas fa-plus-circle"></i> New Stream</button>
    </div>
</div>

<div class="row" style="padding-left: 10px; padding-right: 10px;">
    <?php
        $sql="select * from stream";
        $result=mysqli_query($link,$sql);
        while($row=mysqli_fetch_assoc($result)) {
            echo "<div style='color: #7e2100; border: 2px solid #7e2100; margin-left: 10px; margin-top: 10px; padding: 5px; background: #dba564; font-weight: bold;'><h1 style='color: #ffffff;'><i class='fas fa-university'></i></h1>".$row['strm_name']."</div>";
        }
    ?>
</div>


<!-- The Modal -->
<div class="modal" id="myModal">
<div class="modal-dialog">
	<div class="modal-content">

		<!-- Modal Header -->
		<div class="modal-header">
			<h4 class="modal-title">NEW STREAM</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<!-- Modal body -->
		<div class="modal-body">
			<div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-university"></i></div>
				</div>
				<input type="text" placeholder="stream" id="frmStream" />
			</div>
		</div>
		<!-- Modal footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-success" onclick='saveDept()'><i class="fas fa-save"></i> Save</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-power-off"></i> Close</button>
		</div>

	</div>
</div>
</div>


<?php
	require 'admin_footer.php';
?>