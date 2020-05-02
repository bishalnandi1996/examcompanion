<?php
    require 'admin_authenticate.php';

    $sql="insert into stream(strm_name) values('".$_GET['dept']."')";
    mysqli_query($link,$sql);
    header('Location: admin_departments.php?user='.$_GET['user'].'&key='.$_GET['key'].'&save=1');
?>