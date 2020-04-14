<?php
	require 'admin_authenticate.php';
	require 'admin_header.php';
	require 'admin_menu.php';
?>


<div class="row" style="padding-left: 15px; padding-right: 15px;">
    <?php
        $sql="select * from subject";
        $result=mysqli_query($link,$sql);
        while($row=mysqli_fetch_assoc($result)) {
            echo "<div class='col-sm-3 d-flex justify-content-center' style='border: 5px solid #ffffff; margin: 10px; padding: 5px; background: #9bf873; box-shadow: -5px 5px 10px #1c1d1d;'>".$row['subj_name']."</div>";
        }
    ?>
</div>


<?php
	require 'admin_footer.php';
?>