<?php
    require 'admin_authenticate.php';

    $sql="select * from stream_subjects where stream_subjects.strm_id=".$_GET['deptID']." and stream_subjects.subj_id=".$_GET['subjID'];
    $result=mysqli_query($link,$sql);
    if(mysqli_num_rows($result)==1) {
        header('Location: admin_subjects.php?user='.$_GET['user'].'&key='.$_GET['key'].'&assign=0');
    }
    else {
        $sql="insert into stream_subjects(strm_id,subj_id) values(".$_GET['deptID'].",".$_GET['subjID'].")";
        mysqli_query($link,$sql);
        header('Location: admin_subjects.php?user='.$_GET['user'].'&key='.$_GET['key'].'&assign=1');
    }
?>