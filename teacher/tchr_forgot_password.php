<?php
    require '../linkDB.php';

    $emp_id=mysqli_real_escape_string($link,$_POST['frmEmpId']);
    $password=mysqli_real_escape_string($link,$_POST['frmNewPass']);
    $password=password_hash($password,PASSWORD_DEFAULT);

    $sql="update teacher set tchr_password='".$password."' where tchr_employee_id='".$emp_id."'";
    mysqli_query($link,$sql);
    header('Location: ../index.php?t_pass=1#teacherlogin');
?>