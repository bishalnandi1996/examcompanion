<?php
    require 'admin_authenticate.php';

    $sql="select subject.subj_name as subject from subject, stream, stream_subjects where subject.subj_id=stream_subjects.subj_id and stream.strm_id=stream_subjects.strm_id and stream.strm_id=".$_GET['strm'];
    $result=mysqli_query($link,$sql);
    echo "<div class='row'>";
    while($row=mysqli_fetch_assoc($result)) {
        echo "<div class='col-sm-12' style='border-bottom: 1px solid #c9c9c9; padding: 10px;'><i class='fas fa-book'></i> ".$row['subject']."</div>";
    }
    echo "</div>";
?>