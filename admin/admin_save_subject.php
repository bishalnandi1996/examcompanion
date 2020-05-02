<?php
    require 'admin_authenticate.php';

    $sql="insert into subject(subj_name) values('".$_GET['subj']."')";
    mysqli_query($link,$sql);
    header('Location: admin_subjects.php?user='.$_GET['user'].'&key='.$_GET['key'].'&save=1');
?>