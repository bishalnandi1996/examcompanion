<?php
    require '../linkDB.php';

    $univ_roll=mysqli_real_escape_string($link,$_POST['frmUnivRoll']);
    $password=mysqli_real_escape_string($link,$_POST['frmNewPass']);
    $password=password_hash($password,PASSWORD_DEFAULT);

    $sql="update student set st_password='".$password."' where st_univ_roll=".$univ_roll;
    mysqli_query($link,$sql);
    header('Location: ../index.php?s_pass=1#studentlogin');
?>