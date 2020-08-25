<?php
    require 'admin_authenticate.php';

    $sql="select stream.strm_name as stream from subject, stream, stream_subjects where subject.subj_id=stream_subjects.subj_id and stream.strm_id=stream_subjects.strm_id and subject.subj_id=".$_GET['subj']." order by stream";
    $result=mysqli_query($link,$sql);
    echo "<div class='row'>";
    while($row=mysqli_fetch_assoc($result)) {
        echo "<div class='col-sm-12' style='border-bottom: 1px solid #c9c9c9; padding: 10px;'><i class='fas fa-university'></i> ".$row['stream']."</div>";
    }
    echo "</div>";
?>